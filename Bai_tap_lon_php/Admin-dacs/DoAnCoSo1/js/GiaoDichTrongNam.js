var xValues = ["1","2","3","4","5","6","7","8","9","10","11","12"];
var yValues = [55, 49, 57, 80, 76,55, 55, 54, 67,61,73,80,];
var barColors = ["SaddleBrown","SkyBlue","DarkMagenta","LightGreen","YellowGreen","DarkGrey","FireBrick","MediumVioletRed","PaleVioletRed","SandyBrown","Red","Gold"];

new Chart("GiaoDichTrongNam", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Giao Dịch Trong Năm"
    }
  }
});