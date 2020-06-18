<?php
    require('fpdf182/fpdf.php');
    class PDF extends FPDF
    {
        //declaracion de variables =======================================
        protected $B = 0;
        protected $I = 0;
        protected $U = 0;
        protected $HREF = '';
        //================================================================
        function Header(){}
        //================================================================
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0, 10, utf8_decode('Pagina ').$this->PageNo().'/{nb}', 0, 0,'C');
        }
        //================================================================
        function WriteHTML($html)
        {
            // Intérprete de HTML
            $html = str_replace("\n",' ',$html);
            $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
            foreach($a as $i=>$e)
            {
                if($i%2==0)
                {
                    // Text
                    if($this->HREF)
                        $this->PutLink($this->HREF,$e);
                    else
                        $this->Write(5,$e);
                }
                else
                {
                    // Etiqueta
                    if($e[0]=='/')
                        $this->CloseTag(strtoupper(substr($e,1)));
                    else
                    {
                        // Extraer atributos
                        $a2 = explode(' ',$e);
                        $tag = strtoupper(array_shift($a2));
                        $attr = array();
                        foreach($a2 as $v)
                        {
                            if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                                $attr[strtoupper($a3[1])] = $a3[2];
                        }
                        $this->OpenTag($tag,$attr);
                    }
                }
            }
        }
        //================================================================
        function OpenTag($tag, $attr)
        {
            // Etiqueta de apertura
            if($tag=='B' || $tag=='I' || $tag=='U')
                $this->SetStyle($tag,true);
            if($tag=='A')
                $this->HREF = $attr['HREF'];
            if($tag=='BR')
                $this->Ln(5);
        }
        //================================================================
        function CloseTag($tag)
        {
            // Etiqueta de cierre
            if($tag=='B' || $tag=='I' || $tag=='U')
                $this->SetStyle($tag,false);
            if($tag=='A')
                $this->HREF = '';
        }
        //================================================================
        function SetStyle($tag, $enable)
        {
            // Modificar estilo y escoger la fuente correspondiente
            $this->$tag += ($enable ? 1 : -1);
            $style = '';
            foreach(array('B', 'I', 'U') as $s)
            {
                if($this->$s>0)
                    $style .= $s;
            }
            $this->SetFont('',$style);
        }
        //================================================================
        function PutLink($URL, $txt)
        {
            // Escribir un hiper-enlace
            $this->SetTextColor(0,0,255);
            $this->SetStyle('U',true);
            $this->Write(5,$txt,$URL);
            $this->SetStyle('U',false);
            $this->SetTextColor(0);
        }
        //================================================================
    }
    $pdf = new PDF();
    //▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄Primera página▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    $pdf->AddPage();
    // ---------------Header----------------
    // ---------titulo de la pagina---------
    $pdf->Image('../interfaz/img/logoRepo.png',10,12,30,0,'','http://www.fpdf.org');
    $pdf->SetRightMargin(10);//margen para el contenido
    $pdf->SetLeftMargin(45);//margen para el texto de la img
    $pdf->SetFont('Arial','',15);
    $pdf->SetY(23);
    $pdf->Cell(0, 10, utf8_decode('PRUEBAS DE CONTROL DE CONCRETO HIDRAULICO.'), 0, 0,'C');
    $pdf->SetLeftMargin(10);//margen para el contenido
    $pdf->ln(30);
    // --------------Contenido--------------
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(22, 10, utf8_decode('OBRA'), 1, 0,'C');  
    $pdf->Cell(75, 10, utf8_decode('------'), 1, 0,'C');
    $pdf->Cell(32, 5, utf8_decode('EXPEDIENTE No.: '), 1, 2,'C');    
    $pdf->Cell(32, 5, utf8_decode('FECHA DE RECIBO:'), 1, 0,'C');
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-5);
    $pdf->Cell(60, 5, utf8_decode('-------'), 1, 2,'C');
    $pdf->Cell(60, 5, utf8_decode('-------'), 1, 1,'C');
    $pdf->Cell(22, 5, utf8_decode('Localización:'), 1, 0,'C');
    $pdf->Cell(75, 5, utf8_decode('-------'), 1, 0,'C');
    $pdf->Cell(32, 5, utf8_decode('FECHA DE INFORME: '), 1, 0,'C');
    $pdf->Cell(60, 5, utf8_decode('-------'), 1, 1,'C');
    $pdf->Cell(22, 5, utf8_decode('Elemento:'), 1, 0,'C');
    $pdf->Cell(167, 5, utf8_decode('-------'), 1, 0,'C');
    $pdf->ln(10);    
    //---------------
    $pdf->Cell(22, 15, utf8_decode('Identificacion'), 1, 0,'C');   
    $pdf->Cell(67, 5, utf8_decode('Ensaye No.:'), 1, 2,'C');   
    $pdf->Cell(67, 5, utf8_decode('Muestra No.:'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Tomada de:'), 1, 0,'C');
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-10);
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(100, 5, utf8_decode('DESCARGA CAMION REVOLVEDORA'), 1, 0,'C');
    $pdf->SetXY($pdf->GetX()-100, $pdf->GetY()-10);
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');   
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-5);
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');   
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-5);
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');   
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-5);
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');    
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-5);
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');   
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-5);
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 1,'C');  
    $pdf->ln(5);
    //---------------
    $pdf->Cell(22, 20, utf8_decode('Datos Previos'), 1, 0,'C');
    $pdf->Cell(32, 10, utf8_decode(''), 1, 2,'C');
    $pdf->Cell(32, 10, utf8_decode('No. De Fecha'), 1, 0,'C');
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-10);
    $pdf->Cell(35, 5, utf8_decode('F`c; (Kg/cm²)'), 1, 2,'C');
    $pdf->Cell(35, 5, utf8_decode('Rev. Proyecto,  cm.'), 1, 2,'C');
    $pdf->Cell(35, 5, utf8_decode('Cemento, Marca y Tipo'), 1, 2,'C');
    $pdf->Cell(35, 5, utf8_decode('Consumo  Cemento'), 1, 0,'C');
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-15);
    $pdf->Cell(33, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(33, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(33, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(100, 5, utf8_decode('DOSIFICADO POR LA CONCRETERA'), 1, 0,'C');
    $pdf->SetXY($pdf->GetX()-67, $pdf->GetY()-15);
    $pdf->Cell(33, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(33, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(33, 5, utf8_decode('-----'), 1, 0,'C');  
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-10); 
    $pdf->Cell(34, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(34, 5, utf8_decode('-----'), 1, 2,'C');   
    $pdf->Cell(34, 5, utf8_decode('-----'), 1, 0,'C');  
    $pdf->ln(10);  
    //---------------
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(22, 20, utf8_decode(''), 'LTR', 2,'C');  
    $pdf->Cell(22, 5, utf8_decode('Datos de'), 'LR', 2,'C');  
    $pdf->Cell(22, 5, utf8_decode('la obra'), 'LR', 2,'C');   
    $pdf->Cell(22, 20, utf8_decode(''), 'BLR', 0,'C'); 
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-30);
    $pdf->Cell(32, 5, utf8_decode('adicionante,'), 'TLR', 2,'C');
    $pdf->Cell(32, 5, utf8_decode('Marca y Tipo'), 'BLR', 2,'C');  
    $pdf->Cell(32, 10, utf8_decode('Cemento'), 1, 2,'C');
    $pdf->Cell(32, 5, utf8_decode('adicionante,'), 'TLR', 2,'C');
    $pdf->Cell(32, 5, utf8_decode('Marca y Tipo'), 'BLR', 2,'C'); 
    $pdf->Cell(67, 5, utf8_decode('Equipo  de  mezclado y su capacidad'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Tipo de Vibrador  Utilizado'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Agua,  Consumo  por Saco'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Revenimiento,  cm.'), 1, 2,'C');
    $pdf->SetXY($pdf->GetX()+32, $pdf->GetY()-50);
    $pdf->Cell(35, 5, utf8_decode('Cantidad  Proyecto'), 1, 2,'C');
    $pdf->Cell(35, 5, utf8_decode('Finalidad'), 1, 2,'C');
    $pdf->Cell(35, 5, utf8_decode('Marca  y  Tipo'), 1, 2,'C');
    $pdf->Cell(35, 5, utf8_decode('Consumo'), 1, 2,'C');
    $pdf->Cell(35, 5, utf8_decode('Cantidad  Usada'), 1, 2,'C');
    $pdf->Cell(35, 5, utf8_decode('Finalidad'), 1, 0,'C');
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-25);
    $pdf->Cell(100, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->Cell(100, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->Cell(100, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->Cell(100, 5, utf8_decode('DOSIFICADO POR LA CONCRETERA'), 1, 2,'C');
    $pdf->Cell(100, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->Cell(100, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->Cell(100, 5, utf8_decode('CAMION REVOLVEDORA DE 9 M3'), 1, 2,'C');
    $pdf->Cell(100, 5, utf8_decode('VIBRADOR DE INMERSION'), 1, 2,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->SetXY($pdf->GetX()-83, $pdf->GetY());
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->ln(5);  
    //---------------
    $pdf->Cell(22, 10, utf8_decode(''), 'LTR', 2,'C');  
    $pdf->Cell(22, 5, utf8_decode('Datos del'), 'LR', 2,'C');  
    $pdf->Cell(22, 5, utf8_decode('especimen'), 'LR', 2,'C');  
    $pdf->Cell(22, 10, utf8_decode(''), 'BLR', 0,'C'); 
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-20);
    $pdf->Cell(67, 5, utf8_decode('Diametro,  cm.'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Seccion,  cm²'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Fecha  de  Colado'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Fecha  de  Ruptura'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Edad,  Dias.'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Tipo  de  Prueba'), 1, 0,'C');
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-25);
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->SetXY($pdf->GetX()-83, $pdf->GetY());
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->SetXY($pdf->GetX()-83, $pdf->GetY());
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->SetXY($pdf->GetX()-83, $pdf->GetY());
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->SetXY($pdf->GetX()-83, $pdf->GetY());
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->SetXY($pdf->GetX()-83, $pdf->GetY());    
    $pdf->Cell(100, 5, utf8_decode('COMPRESION AXIAL'), 1, 0,'C');
    $pdf->ln(5);  
    //---------------
    $pdf->Cell(22, 5, utf8_decode(''), 'LTR', 2,'C');  
    $pdf->Cell(22, 5, utf8_decode('Datos del'), 'LR', 2,'C');  
    $pdf->Cell(22, 5, utf8_decode('ensaye'), 'LR', 2,'C');  
    $pdf->Cell(22, 5, utf8_decode(''), 'BLR', 0,'C'); 
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-15);
    $pdf->Cell(67, 5, utf8_decode('Procedimiento  de  Curado'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Carga  de  Ruptura  Kg.'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('Resistencia,  Kg/Cm²'), 1, 2,'C');
    $pdf->Cell(67, 5, utf8_decode('%  de  la Resistencia  de  Proyecto'), 1, 0,'C');
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-15);
    $pdf->Cell(100, 5, utf8_decode('INMERSION EN AGUA'), 1, 2,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->SetXY($pdf->GetX()-83, $pdf->GetY());    
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 2,'C');
    $pdf->SetXY($pdf->GetX()-83, $pdf->GetY());    
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(16, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 0,'C');
    $pdf->Cell(17, 5, utf8_decode('-----'), 1, 1,'C');
    $pdf->ln(5);  
    //---------------
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(189, 5, utf8_decode('OBSERVACIONES   Y  RECOMENDACIONES:'), 'LTR', 1,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(189, 5, utf8_decode('SE REPORTAN LAS RESISTENCIAS OBTENIDAS A LAS EDADES DE  7 ,14 Y 28 DIAS, EL CONCRETO ALCANZÓ LA F"C DE PROYECTO.'), 'LR', 1,'C');
    $pdf->Cell(189, 10, utf8_decode(''), 'LBR', 1,'C');
    $pdf->ln(5);  
    //---------------
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(89, 5, utf8_decode(''), 'LTR', 1,'C');
    $pdf->Cell(89, 5, utf8_decode('EL  LABORATORISTA.'), 'LR', 1,'C');
    $pdf->Cell(89, 5, utf8_decode(''), 'LR', 1,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(89, 5, utf8_decode('ING. CALEB HERNANDEZ AMAYA'), 'LR', 1,'C');
    $pdf->Cell(89, 5, utf8_decode(''), 'LBR', 0,'C');
    $pdf->SetXY($pdf->GetX(), $pdf->GetY()-20);    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(100, 5, utf8_decode(''), 'LTR', 2,'C');
    $pdf->Cell(100, 5, utf8_decode('JEFE DE LABORATORIO.'), 'LR', 2,'C');
    $pdf->Cell(100, 5, utf8_decode(''), 'LR', 2,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(100, 5, utf8_decode('ING. RAUL OBED HERNADEZ KACHOK'), 'LR', 2,'C');
    $pdf->Cell(100, 5, utf8_decode(''), 'LBR', 0,'C');
    // ------------pie de pagina------------
    $pdf->SetLeftMargin(10);//margen para el numero de pagina
    $pdf->AliasNbPages();
    // -------------------------------------
    $pdf->Output();
    //▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
?>