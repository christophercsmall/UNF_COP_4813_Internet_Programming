function findN(arr) {
	var n = arr.length;
	return n;
}
		
function findSum(arr){
	var total = 0;
	for (var i in arr) {
		total += arr[i];
	}
	return round(total);
}

function findMean(arr){
	var total = 0;	
	total = findSum(arr)/findN(arr);	
	return round(total);
}

function findMedian(arr){
	var sortedArr = arr.sort(function (a, b) { return a - b });
	var med = Math.floor(arr.length / 2);

	if (findN(sortedArr) % 2) {
		return round(arr[med]);
	}
	else {
		return round((arr[med - 1] + arr[med]) / 2);
	}
}

function findMode(arr) {
	var modeList = [];
	var multiModes = [];
	var maxCnt = 1;

	if (arr.length == 0)
	return null;          

	for (var i = 0; i < arr.length; i++) {
		var elem = arr[i];

		if (modeList[elem] == null){
			modeList[elem] = 1;
		}
		else {
			modeList[elem]++;
		}

		if (modeList[elem] > maxCnt) {
			multiModes = [elem];
			maxCnt = modeList[elem];
		}
		else if (modeList[elem] == maxCnt) {
				multiModes.push(elem);
				maxCnt = modeList[elem];
		}
	}

	return multiModes;
}

function findVariance(arr) {
	var varArr = [];
	var variance = 0;
	
	for (var i = 0; i < arr.length; i++) {
		varArr[i] = Math.pow(arr[i] - findMean(arr), 2)
	}

	variance = findSum(varArr)/findN(varArr);
	return round(variance);
}

function findStandardDeviation(arr){
	var stdDev = Math.sqrt(findVariance(arr));
	return round(stdDev);
}