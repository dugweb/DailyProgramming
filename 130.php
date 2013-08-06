<html>
<body>

<a href="http://www.reddit.com/r/dailyprogrammer/comments/1iambu/071513_challenge_133_easy_foottraffic_analysis/">Link to challenge</a>

<form id="input" action="130.php" method="post">
	<textarea name="roomio">



	</textarea>
	<button>Submit</button>
</form>




<?php 

function dd($var) {
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
}

class RoomIO {

	protected $n = 0;
	protected $input = array();
	protected $rooms = array();

	public function RoomIO($inputs) {
		$arr = explode("\n", $inputs);
		$this->n = $arr[0];

		array_shift($arr);

		for ($i = 0; $i < count($arr); $i++) {
			$temparray = explode(" ", $arr[$i]);
			array_push($this->input, $temparray);	
		}

		$this->analyzeTraffic();
	}

	public function getInput() {
		return $this->input;
	}

	public function getN() {
		return $this->n;
	}

	public function getRooms() {
		return $this->rooms;
	}

	protected function analyzeTraffic() {
		$inp = $this->input;
		$rms = $this->rooms;
		dd($inp);
		// inp structure
		$personid = 0;
		$roomid = 1;
		$inout = 2;
		$minutes = 3;

		// rms structure
		$totalminutes = 0;
		$visitors = 1;

		for ($i = 0; $i < count($inp); $i++) {

			$rmid = $inp[$i][$roomid];
			// if rms has the room in the array already
			if (isset($rms[$rmid])) {
				
				if ($inp[$i][$inout] == 'I') {
					$rms[$rmid][$totalminutes] -= $inp[$i][$minutes];
				} else {
					$rms[$rmid][$totalminutes] += $inp[$i][$minutes];
					$rms[$rmid][$visitors] += 1;
				}
			} else {

				$newRoom = array(
					'id' => $rmid,
					'visitors' => 0
				);

				if ($inp[$i][$inout] == "I") {
					$totalminutes += $inp[$i][$minutes];
					array_push($newRoom, $totalminutes);
				} else {
					$totalminutes -= $inp[$i][$minutes];
					array_push($newRoom, $totalminutes);
				}
			}
		}

		$this->rooms = $rms;
	}

// person
// Room
// In or Out
// Minutes

}



if (isset($_POST['roomio'])) {
	$fetch = new RoomIO($_POST['roomio']);

	dd($fetch->getRooms());
}



?>


</body>
</html>