<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        function traducir_fecha($fecha){
            
            $fecha_separada = explode(' ', $fecha);
            
            switch ($fecha_separada[0]){
                
                case ('Mon') :
                    $dia = 'Lunes';
                    break;
                case ('Tue') :
                    $dia = 'Martes';
                    break;
                case ('Wed') :
                    $dia = 'Miercoles';
                    break;
                case ('Thu') :
                    $dia = 'Jueves';
                    break;
                case ('Fri') :
                    $dia = 'Viernes';
                    break;
                case ('Sat') :
                    $dia = 'Sábado';
                    break;
                case ('Sun') :
                    $dia = 'Domingo';
                    break;
                
            }
            
            switch ($fecha_separada[3]){
                
                case ('Jan') :
                    $mes = 'Enero';
                    break;
                case ('Feb') :
                    $mes = 'Febrero';
                    break;
                case ('Mar') :
                    $mes = 'Marzo';
                    break;
                case ('Apr') :
                    $mes = 'Abril';
                    break;
                case ('May') :
                    $mes = 'Mayo';
                    break;
                case ('Jun') :
                    $mes = 'Junio';
                    break;
                case ('Jul') :
                    $mes = 'Julio';
                    break;
                case ('Aug') :
                    $mes = 'Agosto';
                    break;
                case ('Sep') :
                    $mes = 'Septiembre';
                    break;
                case ('Oct') :
                    $mes = 'Octubre';
                    break;
                case ('Nov') :
                    $mes = 'Noviembre';
                    break;
                case ('Dec') :
                    $mes = 'Diciembre';
                    break;
                
            }
            
            $fecha = $dia.' '.$fecha_separada[1].' '.$fecha_separada[2].' '.$mes.' '.$fecha_separada[4].' '.$fecha_separada[5];
            
            return $fecha;
            
        }

?>