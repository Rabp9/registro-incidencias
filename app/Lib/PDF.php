<?php

/**
 * CakePHP ReportesController
 * @author admin
 */
App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));

class PDF extends FPDF {
    private $cabecera = array(
        "imagen" => "img/cabecera.jpg",
        "left" => 0,
        "top" => 14,
        "width" => "",
        "height" => ""
    );  
    private $pie = array(
        "imagen" => "img/pie.jpg",
        "left" => 3,
        "top" => 246,
        "width" => 206.5,
        "height" => 51
    );
    
    public function Header() {
        $this->Image($this->cabecera["imagen"], 
            $this->cabecera["left"],
            $this->cabecera["top"],
            $this->cabecera["width"],
            $this->cabecera["height"]
        );
    }

    public function Footer() {
        $this->Image($this->pie["imagen"], 
            $this->pie["left"],
            $this->pie["top"],
            $this->pie["width"],
            $this->pie["height"]
        );
    }
    
    public function title($title) {
        $n = $this->GetStringWidth($title);
        $x = ceil(($this->w - $n) / 2) - 1;
        $this->Text($x,42.5, utf8_decode($title));
    }
    
    public function subtitle($subtitle) {
        $this->SetFont("Georgia", "B", 11);
        $this->Cell($this->w - ($this->lMargin + $this->rMargin), 6, utf8_decode($subtitle), 1);
        $this->SetFont("Georgia", "", 11);
    }
    
    public function content($content) {
        $content_w = 0;
        $this->SetFont("Georgia", "", 11);
        foreach($content as $i => $dato) {
            if($i == (sizeof($content) - 1) && $i == 0){
                $dato_w = $this->w - ($this->lMargin + $this->rMargin);
                $this->Cell($dato_w, 6, utf8_decode($dato), 1);
            }
            elseif($i == (sizeof($content) - 1)) {
                $dato_w = $this->GetStringWidth($dato) + 2;
                $this->Cell($dato_w, 6, utf8_decode($dato), "TB");
                $content_w += $dato_w;
                $last_dato_w = ($this->w - ($this->lMargin + $this->rMargin)) - $content_w;
                $this->Cell($last_dato_w, 6, "", "TBR");
            } elseif($i == 0) {
                $dato_w = $this->GetStringWidth($dato) + 2;
                $this->Cell($dato_w, 6, utf8_decode($dato), "LTB");
                $this->Cell(10, 6, "", "TB");
                $content_w += $dato_w + 10;
            } else {
                $dato_w = $this->GetStringWidth($dato) + 2;
                $this->Cell($dato_w, 6, utf8_decode($dato), "TB");
                $this->Cell(10, 6, "", "TB");
                $content_w += $dato_w + 10;
            }
        }    
    }
    
    public function table($cabeceras, $info, $columns) {
        $this->SetFont("Georgia", "B", 11);
        foreach($cabeceras as $cabecera) {
            $this->Cell($cabecera["width"], 6, utf8_decode($cabecera["descripcion"]), 1);
        }
        $this->ln();
        $this->SetFont("Georgia", "", 11);
        foreach($info as $k_data => $data) {
            foreach($columns as $k_column => $column) {
                $this->Cell($cabeceras[$k_column]["width"], 6, utf8_decode("asdsa"), 1);
            }               
            $this->ln();
        }
    }
}
?>