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
                'login'=>APP_W.'/login'),
            'reg'=>array('Inici'=>APP_W      
                ),
            'res'=>array('Inici'=>APP_W)
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
