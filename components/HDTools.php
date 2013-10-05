<?php
/**
 * Developer: HellDoG
 * Date: 09.08.13
 * Time: 12:57
 */
class HDTools
{
    /**
     * Конфигурация компонента
     * @param $func
     * @return mixed
     */
    static function config($func)
    {
        $config = array(
            'hideMail' => array(
                'images' => array(
                    'default' => Yii::app()->baseUrl.'/web/images/mbk.gif',
                )
            ),
        );

        return $config[$func];
    }

    /**
     * @param $mail Непосредственно сам email
     * @param null $image Адрес картинки или псевдоним из шаблона. По умлочанию берется псевдоним 'default'
     * @return string E-mail
     */
    static function hideMail($mail,$image = null)
    {
        $image = $image ?: 'default';
        $config = self::config('hideMail');
        $parts = explode('@',$mail);
        $imagePath = array_key_exists($image,$config['images'])? $config['images'][$image] : $image;
        $mail = $parts[0].CHtml::image($imagePath).$parts[1];

        return $mail;
    }

}
