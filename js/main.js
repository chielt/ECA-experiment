$(document).ready(function() {
	$( "#btn-start" ).click(function() {
	  $( 'div#start' ).hide();
	  	$("#btn-start").unbind('click');
	  	SetupQuestion(1);	  	
	});

	$(function() {
	    $( "#slider-CQ1" ).slider({
	      value:4,
	      min: 1,
	      max: 7,
	      step: 1,
	      slide: function( event, ui ) {
	        $( "#CQ1" ).val( ui.value );
	      }
	    });
	    $( "#CQ1" ).val( $( "#slider-CQ1" ).slider( "value" ) );
	  });
	$(function() {
	    $( "#slider-CQ2" ).slider({
	      value:4,
	      min: 1,
	      max: 7,
	      step: 1,
	      slide: function( event, ui ) {
	        $( "#CQ2" ).val( ui.value );
	      }
	    });
	    $( "#CQ2" ).val( $( "#slider-CQ2" ).slider( "value" ) );
	  });
	$(function() {
	    $( "#slider-CQ3" ).slider({
	      value:4,
	      min: 1,
	      max: 7,
	      step: 1,
	      slide: function( event, ui ) {
	        $( "#CQ3" ).val( ui.value );
	      }
	    });
	    $( "#CQ3" ).val( $( "#slider-CQ3" ).slider( "value" ) );
	  });
});

function PostAnswer(question, answer) {
	if ($('#'+ question + ' #vid-instr:first').length != 0) {
		$('#'+question + ' #vid-instr:first').get(0).pause();
	}
	$("div[id='"+question+"']").addClass('hidden');
	var duration = new Date() - window.timeStarted;
	console.log('postanswer', question, duration, answer);
	$.post( "post-data.php", { 'question': question, 'duration': duration, 'answer': answer, 'questionaire': questionaire}, function(result) {
		var nextQuestion = parseInt(question)+1;
		if ($("#"+nextQuestion).length == 0) {
			/*alert('You have reached the end of this task');*/
			window.location.href = "savedata.php";
		} else {
			$( 'div#start' ).show();
			$('#btn-start').html('Next question');
			$( "#btn-start" ).click(function() {
			  $( 'div#start' ).hide();
			  SetupQuestion(nextQuestion);
			});
		}
	}, "json");
}

function SetupQuestion(i) {
	$("#btn-start").unbind('click');
	console.log('setupquestion', i);
		$("#"+i).removeClass('hidden');	
		window.timeStarted = new Date();
		$("#"+i+ " #answers a img").click(function() {
			PostAnswer($(this).parent().parent().parent().parent().attr('id'), $(this).attr("rel"));
		});	

		if ($('#'+ i + ' #vid-instr').length != 0) {
		  $('#'+i + ' #vid-instr:first').get(0).play();

		}

}

