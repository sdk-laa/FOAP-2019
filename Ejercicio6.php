<?php
            
            function String(){
                $Texto="hola mundo";
                echo strlen($Texto);
                $array=str_split("$Texto") 
                $Longitud=strlen($Texto);
                $j=0;
                $MaxCaracter=$array[$j];
                for ($i=0; $i<$Longitud; $i++){
                    if ($MaxCaracter=$array[$j]){
                        
                    }
                }
                return $MaxCaracter; 
            }

/*             function _Max($numeros){
                $Max=0;
                foreach($numeros as $valor){
                    if ($Max < $valor){
                        $Max=$valor;
                    }
                }    
                return $Max;
            }

            function _Min($numeros){
                $Min=100;
                foreach($numeros as $valor){
                    if ($Min > $valor){
                        $Min=$valor;
                    }
                }    
                return $Min;
            }

            function _Suma($numeros){
                $suma=0;
                foreach($numeros as $valor){
                    $suma += $valor;    
                }
                return $suma;
            }  */  
            
/*             $numeros=generararray(10);
            echo "<br>Contenido del array:</br>";
            print_r($numeros);
	        echo "<br> El resultado de las funciones creadas en el programa: " 			     
            echo "<br>El max es "._max($numeros);
            echo "<br>El min es "._min($numeros);
            echo "<br>La suma es "._Suma($numeros);
            	
            echo "<br>El resultado de las funciones internas PHP: ";
            echo "<br>El max es: ";
            echo max($numeros);
            echo "<br>El min es: ";
            echo min($numeros);
            echo "<br>La suma es: ";
            echo array_sum($numeros);
            echo "<br>"; */
            
		?>