<?php

    $diccionari=array(
        'subtitol'=>array(
            'index'=>'Portada',
            'login'=>'Login',
            'reg'=>'Registre',
            'res'=>'Reserves'
        ),
        'menu'=>array(
            'index'=>array(
                'Inici'=>APP_W.'/Index',
                'Registre'=>APP_W.'/Reg',
                'Reserves'=>APP_W.'/Res',
                'Hotels'=>APP_W.'/Res/hotels',
                'Vols'=>APP_W.'/Res/vols',
                'Ofertes'=>APP_W.'/Res/ofertes',
                'login'=>APP_W.'/Login',
                'logout'=>APP_W.'/Index/logout'),
            'reg'=>array('Inici'=>APP_W,
                'Registre'=>APP_W.'/Reg',
                 'login'=>APP_W.'/Login',
                'logout'=>APP_W.'/Index/logout'
                ),
            'login'=>array('Inici'=>APP_W,
                'Registre'=>APP_W.'/Reg',
                 'login'=>APP_W.'/Login',
                'logout'=>APP_W.'/Index/logout'
                ),
            'res'=>array('Inici'=>APP_W,
                'Registre'=>APP_W.'/Reg',
                 'login'=>APP_W.'/Login',
                'logout'=>APP_W.'/Index/logout')
            ),
        'actions'=>array(
            'REGISTRAR'=>APP_W.'/Reg/send',
            'LOG'=>APP_W.'/Login/log'),
        'missatge'=>array(
            'index'=>'Ofertes Vols i Hotels',
            'login'=>'Inici de sessió',
            'reg'=>'Registre de nou usuari',
            'res'=>'Reserves')
          
        
    )
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
