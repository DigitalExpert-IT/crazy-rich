$(document).ready(function(){
    
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "template/packet_json.php",
    }).then((res)=>{
        var arr = res.count.map(function(v) {
            return parseInt(v, 10);
          });
        var options = {
            chart: { height: 320, type: "donut" },
            series: arr,
            labels: res.name,
            colors: ["#34c38f", "#5b73e8", "#f1b44c", "#50a5f1"],
            legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0 },
            responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
            };
            (chart = new ApexCharts(document.querySelector("#donut_chart"), options)).render();
    })

})
