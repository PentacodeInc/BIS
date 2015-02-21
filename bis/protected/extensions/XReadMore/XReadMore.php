<?php

/**
 * XReadMore
 * ---------
 * A widget to shorten html content to a certain length, and give a link to read
 * for the full text.
 *
 * ###Use
 * ####Simple case
 * In the view add:
 * ~~~
 * [php]
 *     <?php
 *     $this->widget('ext.XReadMore.XReadMore', array(
 *       'model'=>$data,
 *         'attribute'=>'Content',
 *     ));
 *
 *     $this->widget('ext.XReadMore.XReadMore', array(
 * 'showLink'=>false,
 * 'model'=>$data,
 * 'attribute'=>'Content',
 * 'maxChar'=>100,
 * ));
 *     ?>
 * ~~~
 *
 * @version 1.2
 * @author  Syakur Rahman bS.xx7_37@yahoo.com
 * @authod  Denis Bagrov aka Usui eitalian2@gmail.com
 * @license New BSD License
 *
 * History:
 * 21/03/13 Add a public function so it could be called without a widget.
 */
class XReadMore extends CWidget
{
    /**
     * @var boolean Show link to go to full text page
     * @since 1.0
     */
    public $showLink = true;

    /**
     * @var string Character to seperate text & link
     * @since 1.2
     */
    public $separatorLink = "<br />";

    /**
     * @var CModel the data model, if set use model->attribute for long text, defaults to null
     * @since 1.1
     */
    public $model = null;

    /**
     * @var string the attribute
     * @since 1.0
     */
    public $attribute = null;

    /**
     * @var string the long text, model proprty should be null to use this
     * @since 1.0
     */
    public $text = null;

    /**
     * @var boolean determines whether to return plain text or html text
     * @since 1.0
     */
    public $stripTags = true;

    /**
     * @var string string of allowed tags @see strip_tags
     * @since 1.3
     */
    public $allowedTags = '';

    /**
     * @var int the maximal count of character before it is truncated
     * @since 1.0
     */
    public $maxChar = 400;

    /**
     * @var string the separator to use after maxChar is satisfied
     * @since 1.0
     */
    public $separator = " ";

    /**
     * @var array link html options.
     * @since 1.0
     */
    public $linkHtmlOptions = array();

    /**
     * @var string link label, default 'Read more...'.
     * @since 1.0
     */
    public $linkText = 'Read more...';

    /**
     * @var string link url.
     * @since 1.0
     */
    public $linkUrl = null;

    /**
     * @var boolean if short version will be returned or echoed.
     * @since 1.0
     */
    public $return = false;

    /**
     * @var string
     * @since 1.3
     */
    public $charset = 'UTF-8';

    /**
     * Initialize the extension
     */
    public function init() {
        parent::init();
        $this->validate();
        if ($this->linkUrl === null && $this->showLink) {
            $this->linkUrl = array(strtolower(get_class($this->model))."/view", "id" => $this->model->primaryKey);
        }
    }

    /**
     * Main function to shorten the text.
     *
     * @param string $text The text to be shorten.
     *
     * @return string
     *
     */
    public function shorten($text) {
        Yii::beginProfile('XReadMore');
        //header('Content-type: text/html; charset=utf-8');
        if ($this->model !== null) {
            $attribute = $this->attribute;
            $tmp       = $this->model->$attribute;
        } else {
            $tmp = $text;
        }

        if ($this->stripTags) {
            $tmp = trim(strip_tags($tmp, $this->allowedTags));
        }

        //CVarDumper::dump('Исходный текст -'.$tmp);
        $striped = trim(strip_tags($text));
        $sLen    = mb_strlen($striped, $this->charset);

        if ($sLen > $this->maxChar) {
            $purifier = new CHtmlPurifier;

            Yii::beginProfile('XReadMore-0: Поиск текста до нужной длинны');
            //получаем длинну строки строки обрезанную до первого пробела после максимальной длинны
            $sLenS = mb_strpos($striped, $this->separator, $this->maxChar, $this->charset);
            //Если длинна получена режем текст до этого слова
            $sLen    = $sLenS ? : $this->maxChar;
            $striped = mb_substr($striped, 0, $sLen, $this->charset);
            $striped = preg_replace("/[\W\d]\s*/um", ' ', $striped);
            $striped = preg_replace("/\s+/", ' ', $striped);

            $sWords = explode(' ', $striped);

            if (!$sLenS) {
                array_pop($sWords);
                $striped = join(' ', $sWords);
            }
            Yii::endProfile('XReadMore-0: Поиск текста до нужной длинны');

            Yii::beginProfile('XReadMore-1: Получение текста для поиска с учетом компенсации тегов');
            //от этой длинны мы будем искать слова в тексе с тегами
            $sLen    = mb_strlen($striped, $this->charset);
            //CVarDumper::dump('Длинна строки больше нужной длинны до первого пробела: '.$sLenS);

            //высчитываем длинну тегов - длинна тегов нас не интересует мы режемпо видимому тексту
            $sTmp    = mb_substr($tmp, 0, $sLen, $this->charset);
            $tmpLen  = mb_strlen($sTmp, $this->charset);
            $tmpTLen = mb_strlen($sTmp, $this->charset) - mb_strlen(strip_tags($sTmp), $this->charset);
            //CVarDumper::dump('Длинна тегов в полученном тексте - '.$tmpTLen);
            //компенсируем эти теги
            $tmpLen  += $tmpTLen;
            //получаем текст для поиска с учетом компенсации тегов
            $fTmp = mb_substr($tmp, 0, $tmpLen, $this->charset);
            //CVarDumper::dump('Текст для поиска с компенсированной длинной с исправленными тегами - '.$fTmp);
            Yii::endProfile('XReadMore-1: Получение текста для поиска с учетом компенсации тегов');

            Yii::beginProfile('XReadMore-2: Поиск слов в тексте для поиска');
            $fLen = false;
            $delta = 0;
            //Искомое слово должно быть в диапазоне 10% погрешности и при отклонении символов не более чем 20
            while (($fLen === false || $fLen < ($this->maxChar+$tmpTLen)*0.9) && $delta <= 20) {
                //берем последнее слово из массива для поиска
                $fWold  = array_pop($sWords);
                if (mb_strlen($fWold, $this->charset) < 3) {
                    $fWold = array_pop($sWords);
                }
                $delta += mb_strlen($fWold, $this->charset);
                //CVarDumper::dump('Слово для поиска - '.$fWold);
                //CVarDumper::dump('Отклонение символов - '.$delta);
                //и ищем его последнее вхождение в тексте
                $fLen  = mb_strrpos($fTmp, $fWold, null, $this->charset);
            }
            Yii::endProfile('XReadMore-2: Поиск слов в тексте для поиска');

            Yii::beginProfile('XReadMore-3: Поиск слов в исходном тексте от нужной длинны');
            //Когда тегов очень много придется искать вперед
            if ($fLen === false || $fLen < ($this->maxChar+$tmpTLen)*0.9) {
                //CVarDumper::dump('Длинна возможного текста слишком коротка');
                //снова получаем все слова
                $sWords = explode(' ', $striped);
                $fLen = false;
                while ($fLen === false) {
                    //берем последнее слово из массива для поиска
                    $fWold = array_pop($sWords);
                    if (mb_strlen($fWold, $this->charset) < 3) {
                        $fWold = array_pop($sWords);
                    }
                    //CVarDumper::dump('Слово для поиска - '.$fWold);
                    //и ищем его первое вхождение от нужной длинны
                    $fLen  = mb_strpos($tmp, $fWold, $tmpLen, $this->charset);
                }
            }
            Yii::endProfile('XReadMore-3: Поиск слов в исходном тексте от нужной длинны');

            Yii::beginProfile('XReadMore-4: Получение нужного текста и исправление тегов');
            //к длинне найденой добавляем длинну слова
            $fLen += mb_strlen($fWold, $this->charset);
            //режеми, удаляем ненужные символы
            $tmp = mb_substr($tmp, 0, $fLen, $this->charset);
            $tmp = rtrim($tmp, '.,;:\\').' ...';
            $tmp = $purifier->purify($tmp);
            CVarDumper::dump(mb_strlen(strip_tags($tmp), $this->charset));
            Yii::endProfile('XReadMore-4: Получение нужного текста и исправление тегов');
        }

        if ($this->showLink) {
            $tmp .= $this->separatorLink.CHtml::link($this->linkText, $this->linkUrl, $this->linkHtmlOptions);
        }

        Yii::endProfile('XReadMore');
        return $tmp;
    }

    /**
     * Executes as a widget
     */
    public function run() {
        echo $this->shorten($this->text);
    }

    /**
     * Validates the text given to the extension
     *
     * @throws CException
     */
    private function validate() {
        if ($this->model === null && $this->text === null) {
            throw new CException("Either model or text needs to have a value.");
        }
        if ($this->model !== null) {
            if ($this->attribute === null) {
                throw new CException("Attribute has an invalid value.");
            }
        }
        if ($this->text !== null) {
            if ($this->linkUrl === null && $this->showLink) {
                throw new CException("LinkUrl has an invalid value.");
            }
        }
    }
}
