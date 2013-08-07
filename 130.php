<html>
<body>

<a href="http://www.reddit.com/r/dailyprogrammer/comments/1iambu/071513_challenge_133_easy_foottraffic_analysis/">Link to challenge</a>

<form id="input" action="130.php" method="post">
	<textarea name="roomio"><?php if (isset($_POST['roomio'])) {
			echo $_POST['roomio'];
		}?></textarea>
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
		$inp = $this->input; // Original input array
		$rms = $this->rooms; // Output array
		
		// inp structure
		// person
		// Room
		// In or Out
		// Minutes
		$personidindex = 0;
		$roomidindex = 1;
		$inoutindex = 2;
		$minutes = 3;

		for ($i = 0; $i < count($inp); $i++) {

			// rms structure
			$totalminutes = 0;
			$visitors = 0;

			$roomid = $inp[$i][$roomidindex];
			
			// if rms doesn't have the room in the array already
			if (!isset($rms[$roomid])) {
				$rms[$roomid] = array(
					'id' => $roomid,
					'visitors' => 0,
					'minutes' => 0
				);				
			} 

			if ($inp[$i][$inoutindex] == 'I') {
					$rms[$roomid]['minutes'] -= $inp[$i][$minutes];
			} else {
					$rms[$roomid]['minutes'] += $inp[$i][$minutes];
					$rms[$roomid]['visitors'] += 1;
			}

		}
		$this->rooms = $rms;
	}

	public function outputAnalysis() {
		$output = array();
		
		foreach ($this->rooms as $key => $value) {
			
			$room = $this->rooms[$key]['id'];
			$average = floor($this->rooms[$key]['minutes'] / $this->rooms[$key]['visitors']);
			$visitors = $this->rooms[$key]['visitors'];

			array_push($output, "Room $room, $average minute average visit, $visitors visitor(s) total");
		} 

		return $output;
	}
}

if (isset($_POST['roomio'])) {
	$fetch = new RoomIO($_POST['roomio']);

	dd($fetch->outputAnalysis());
}

?>

</body>
</html>