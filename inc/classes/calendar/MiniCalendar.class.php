<?php

	class MiniCalendar {
		
		protected $cells;
		protected $center;
		protected $attributes;
		
		public function __construct() {
			$this->center = time();
			$this->cells = [];
			$this->attributes = [];
			$this->centerLinkParameter = 'center';
		}
		
		public function setCenter($center) {
			if (!is_numeric($center)) {
				$center = strtotime($center);
			} elseif ($center < 60*60) {
				$center = strtotime($center . '-01-01');
			}
			$this->center = $center;
		}
	
		public function setDateHasContent($date) {
			if (!is_numeric($date)) {
				$date = strtotime($date);
			}
			$date = date('Ymd',$date);
			$this->cells[$date] = true;
		}
		
		public function setAttribute($attribute, $value) {
			$this->attributes[$attribute] = $value;
		}
		
		public function toHTML() {
			$html = '';
			$html .= '<table '.$this->buildAttributes().'>';
				$html .= $this->buildMonthSmall();
			$html .= '</table>';
			return $html;
		}
		
		protected function buildAttributes() {
			$html = '';
			foreach($this->attributes as $attribute => $value) {
				if ($attribute == 'class') {$attribute .= ' '.$this->view;}
				$html .= $attribute . '="' . $value . '" ';
			}
			if (empty($this->attributes['class'])) {
				$html .= 'class="'.$this->view.'" ';
			}
			return $html;
		}
	
		protected function buildMonthSmall() {
			$html = '';
			
			$start = $this->center - ((date('j',$this->center) - 1) * 60*60*24);
			$end = strtotime('-1 second', strtotime('+1 month', $start));
			
			$start = $start - (date('w',$start) * 60*60*24);
			$weeks = ceil(($end - $start) / (60*60*24*7));
			
			$html .= '<tr><th colspan="7" class="main">'.date('F Y',$this->center).'</th></tr>';
			$html .= '<tr><th>S</th><th>M</th><th>T</th><th>W</th><th>R</th><th>F</th><th>S</th></tr>';
			
			for ($x = 0; $x < $weeks; $x++) {
				$html .= '<tr>';
					for ($y = 0; $y < 7; $y++) {
						
						$day = strtotime('+'.(($x * 7) + $y).' day', $start);
						$Ymd = date('Ymd', $day);
						
						$class = '';
						if (date('Ymd',$day) == date('Ymd')) {
							$class .= 'today ';
						}
						if (date('m',$day) != date('m', $this->center)) {
							$class .= 'outofrange ';
						}
						if (!empty($this->cells[$Ymd])) {
							$class .= 'hascontent ';
						}
						
						$html .= '<td class="'.$class.'">';
							$html .= date('j',$day);
						$html .= '</td>';
						
					}
				$html .= '</tr>';
			}
			
			return $html;
		}
		
	}

?>