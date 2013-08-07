<html>
<body>

<a href="http://www.reddit.com/r/dailyprogrammer/comments/1iambu/071513_challenge_133_easy_foottraffic_analysis/">Link to challenge</a>
Sample Input
<pre>
36
0 11 I 347
1 13 I 307
2 15 I 334
3 6 I 334
4 9 I 334
5 2 I 334
6 2 I 334
7 11 I 334
8 1 I 334
0 11 O 376
1 13 O 321
2 15 O 389
3 6 O 412
4 9 O 418
5 2 O 414
6 2 O 349
7 11 O 418
8 1 O 418
0 12 I 437
1 28 I 343
2 32 I 408
3 15 I 458
4 18 I 424
5 26 I 442
6 7 I 435
7 19 I 456
8 19 I 450
0 12 O 455
1 28 O 374
2 32 O 495
3 15 O 462
4 18 O 500
5 26 O 479
6 7 O 493
7 19 O 471
8 19 O 458
</pre>

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