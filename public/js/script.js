$("#night-button").click(function(){
	$("main").css("background-color", "black");
	$("html").css("background-color", "black");
	$("section div h1").css("color", "white");
	$('.bg-light').each(function () {
      this.style.setProperty('background-color', 'black', 'important');
    });
    $("nav a").css("color", "white");
    $("#day-button").css("color", "white").css("border-color", "white");
    $(this).css("color", "white").css("border-color", "white");
});

$("#day-button").click(function(){
	$("main").css("background-color", "white");
	$("html").css("background-color", "white");
	$("section div h1").css("color", "black");
	$('.bg-light').each(function () {
      this.style.setProperty('background-color', '#f8f9fa', 'important');
    });
    $("nav a").css("color", "rgba(0,0,0,.7)");
    $("#night-button").css("color", "black").css("border-color", "black");
    $(this).css("color", "black").css("border-color", "black");
});

// $( "#toggle-button" ).toggle(function() {
//     $("main").css("background-color", "black");
//     $("html").css("background-color", "black");
//     $("section div h1").css("color", "white");
//     $('.bg-light').each(function () {
//         this.style.setProperty('background-color', 'black', 'important');
//     });
//     $("nav a").css("color", "white");
//     $("#day-button").css("color", "white").css("border-color", "white");
//     $(this).css("color", "white").css("border-color", "white");
// }, function() {
//     $("main").css("background-color", "white");
//     $("html").css("background-color", "white");
//     $("section div h1").css("color", "black");
//     $('.bg-light').each(function () {
//       this.style.setProperty('background-color', '#f8f9fa', 'important');
//     });
//     $("nav a").css("color", "rgba(0,0,0,.7)");
//     $("#night-button").css("color", "black").css("border-color", "black");
//     $(this).css("color", "black").css("border-color", "black");
// });

