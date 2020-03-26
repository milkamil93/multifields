<?php

namespace Multifields\Elements;

class Richtext extends \Multifields\Base\Elements
{
    protected $styles = 'richtext.css';
    protected $scripts = 'richtext.js';
    protected $tpl = 'richtext.tpl';

    protected $disabled = false;

    public function actionDisplay()
    {
        $evo = evolutionCMS();
        $this->_template = file_get_contents(__DIR__ . '/editor.tpl');

        $which_editor = $evo->getConfig('which_editor');

        define($which_editor . '_INIT_INTROTEXT', 1);

        $which_editor_config = [
            'editor' => $which_editor,
            'elements' => ['ta'],
            'options' => [
                'ta' => [
                    'theme' => 'custom',
                    'width' => '100%',
                    'height' => '100%',
                    'block_formats' => 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3;Header 4=h4;Header 5=h5;Header 6=h6;Div=div'
                ]
            ]
        ];

        $body_class = '';
        $theme_modes = array('', 'lightness', 'light', 'dark', 'darkness');
        $theme_mode = isset($_COOKIE['MODX_themeMode']) ? $_COOKIE['MODX_themeMode'] : '';
        $manager_theme_mode = $evo->getConfig('manager_theme_mode');
        if (!empty($theme_modes[$theme_mode])) {
            $body_class .= ' ' . $theme_modes[$theme_mode];
        } elseif (!empty($theme_modes[$manager_theme_mode])) {
            $body_class .= ' ' . $theme_modes[$manager_theme_mode];
        }

        // invoke OnRichTextEditorInit event
        $evtOut = $evo->invokeEvent('OnRichTextEditorInit', $which_editor_config);
        if (is_array($evtOut)) {
            $evtOut = implode('', $evtOut);
        } else {
            $evtOut = '';
        }

        return $this->view([
            'lang' => $evo->getConfig('lang_code'),
            'MGR_DIR' => MGR_DIR,
            'manager_theme' => $evo->getConfig('manager_theme'),
            'body_class' => $body_class,
            'evtOut' => $evtOut
        ]);
    }
}