var pageUrl=window.location.origin+'/cardmaker';
$(document).ready(function(){

	$(window).on('scroll', function() {
	  if (window.getSelection) {
	    window.getSelection().removeAllRanges();
	  } else if (document.selection) {
	    document.selection.empty();
	  }
	});

	var pageUrl=window.location.origin+'/cardmaker';
	$('.form').on('submit',function(e){
		e.preventDefault();
		var form=$(this);
		submitForm(form);
	 });





  $('.deleteWedding').click(function() {
	$('.msgShow').html('');
    var deleteID = $(this).attr('weddingCardID');

    $('.yesDeleteWedding').click(function() {
	        $.ajax({
	            url: pageUrl + "/files/requestPage.php",
	            method: 'POST',
	            data: {
	                'deleteWedding': 'deleteWedding',
	                'deleteID': deleteID
	            },
	            success: function(response) {
	                show_message(response, $('.msgShow'));
	            }
	        });
	    });
	});


  $('.deleteBirthday').click(function() {
	$('.msgShow').html('');
    var birthdayCardID = $(this).attr('birthdayCardID');

    $('.yesDeleteBirthday').click(function() {
	        $.ajax({
	            url: pageUrl + "/files/requestPage.php",
	            method: 'POST',
	            data: {
	                'deleteBirthday': 'deleteBirthday',
	                'deleteID': birthdayCardID
	            },
	            success: function(response) {
	                show_message(response, $('.msgShow'));
	            }
	        });
	    });
	});

   $('.deleteEidCard').click(function() {
	$('.msgShow').html('');
    var eidCardID = $(this).attr('eidCardID');

    $('.yesDeleteEid').click(function() {
	        $.ajax({
	            url: pageUrl + "/files/requestPage.php",
	            method: 'POST',
	            data: {
	                'deleteEidCard': 'deleteEidCard',
	                'eidCardID': eidCardID
	            },
	            success: function(response) {
	                show_message(response, $('.msgShow'));
	            }
	        });
	    });
	});


    $('.deleteAnniversary').click(function() {
		$('.msgShow').html('');
	    var anniversaryCardID = $(this).attr('anniversaryCardID');

	    $('.yesDeleteAnniversary').click(function() {
		        $.ajax({
		            url: pageUrl + "/files/requestPage.php",
		            method: 'POST',
		            data: {
		                'deleteAnniversaryCard': 'deleteAnniversaryCard',
		                'anniversaryCardID': anniversaryCardID
		            },
		            success: function(response) {
		                show_message(response, $('.msgShow'));
		            }
		        });
		    });
	  });


    $('.deleteThankYouCard').click(function() {
		$('.msgShow').html('');
	    var thankYouCardID = $(this).attr('thankYouCardID');

	    $('.yesDeleteThankYou').click(function() {
		        $.ajax({
		            url: pageUrl + "/files/requestPage.php",
		            method: 'POST',
		            data: {
		                'deleteThankYouCard': 'deleteThankYouCard',
		                'thankYouCardID': thankYouCardID
		            },
		            success: function(response) {
		                show_message(response, $('.msgShow'));
		            }
		        });
		    });
	  });

        $('.deleteVisitingCard').click(function() {
		$('.msgShow').html('');
	    var visitingCardID = $(this).attr('visitingCardID');

	    $('.yesDeleteVisiting').click(function() {
		        $.ajax({
		            url: pageUrl + "/files/requestPage.php",
		            method: 'POST',
		            data: {
		                'deleteVisitingCard': 'deleteVisitingCard',
		                'visitingCardID': visitingCardID
		            },
		            success: function(response) {
		                show_message(response, $('.msgShow'));
		            }
		        });
		    });
	  });


	$('#print-button').click(function() {
        var printContents = $('.printable-content').html();
        var originalContents = $('body').html();

        $('body').html(printContents);
         window.print();

        $('body').html(originalContents);
        window.location.reload();
    });


    $('#c_print-button').click(function() {
        var printContents = $('.printable-content').html();
        var originalContents = $('body').html();

        $('body').html(printContents);
         window.print();

        $('body').html(originalContents);
       
    });



    $('#birthdayCardDownload').click(function() {
        var canvas = document.createElement('canvas');
        var card = $('.printable-content')[0];
        var cardRect = card.getBoundingClientRect();

        canvas.width ="800";
        canvas.height ="500";

        var context = canvas.getContext('2d');

        html2canvas(card, { canvas: canvas }).then(function() {
            var image = canvas.toDataURL('image/jpeg');

            var link = document.createElement('a');
            link.href = image;
            link.download = 'card_image.jpg';
            link.click();
        });
    });


    $('#thankYouCardDownload').click(function() {
        var canvas = document.createElement('canvas');
        var card = $('.printable-content')[0];
        var cardRect = card.getBoundingClientRect();

        canvas.width ="800";
        canvas.height ="400";

        var context = canvas.getContext('2d');

        html2canvas(card, { canvas: canvas }).then(function() {
            var image = canvas.toDataURL('image/jpeg');

            var link = document.createElement('a');
            link.href = image;
            link.download = 'card_image.jpg';
            link.click();
        });
    });


    $('#weddingCardDownload').click(function() {
        var canvas = document.createElement('canvas');
        var card = $('.printable-content')[0];
        var cardRect = card.getBoundingClientRect();

        canvas.width ="530";
        canvas.height ="690";

        var context = canvas.getContext('2d');

        html2canvas(card, { canvas: canvas }).then(function() {
            var image = canvas.toDataURL('image/jpeg');

            var link = document.createElement('a');
            link.href = image;
            link.download = 'card_image.jpg';
            link.click();
        });
    });

     $('#weddingCardCreate').click(function() {
        var canvas = document.createElement('canvas');
        var card = $('.printable-content')[0];
        var cardRect = card.getBoundingClientRect();

        canvas.width ="650";
        canvas.height ="580";

        var context = canvas.getContext('2d');

        html2canvas(card, { canvas: canvas }).then(function() {
            var image = canvas.toDataURL('image/jpeg');

            var link = document.createElement('a');
            link.href = image;
            link.download = 'card_image.jpg';
            link.click();
        });
    });

    $('#anniversaryCardDownload2').click(function() {
        var canvas = document.createElement('canvas');
        var card = $('.printable-content')[0];
        var cardRect = card.getBoundingClientRect();

        canvas.width ="820";
        canvas.height ="800";

        var context = canvas.getContext('2d');

        html2canvas(card, { canvas: canvas }).then(function() {
            var image = canvas.toDataURL('image/jpeg');

            var link = document.createElement('a');
            link.href = image;
            link.download = 'card_image.jpg';
            link.click();
        });
    });


     $('#anniversaryCardDownload').click(function() {
        var canvas = document.createElement('canvas');
        var card = $('.printable-content')[0];
        var cardRect = card.getBoundingClientRect();

        canvas.width ="800";
        canvas.height ="790";

        var context = canvas.getContext('2d');

        html2canvas(card, { canvas: canvas }).then(function() {
            var image = canvas.toDataURL('image/jpeg');

            var link = document.createElement('a');
            link.href = image;
            link.download = 'card_image.jpg';
            link.click();
        });
    });


   $('#eidCardDownload').click(function() {
	    var canvas = document.createElement('canvas');
	    var card = $('.printable-content')[0];
	    var cardRect = card.getBoundingClientRect();

	    var cardStyle = window.getComputedStyle(card);
	    var paddingLeft = parseFloat(cardStyle.paddingLeft);
	    var paddingRight = parseFloat(cardStyle.paddingRight);
	    var paddingTop = parseFloat(cardStyle.paddingTop);
	    var paddingBottom = parseFloat(cardStyle.paddingBottom);

	    var canvasWidth = cardRect.width - paddingLeft - paddingRight;
	    var canvasHeight = cardRect.height - paddingTop - paddingBottom;

	    canvas.width ="800";
        canvas.height ="730";

	    var context = canvas.getContext('2d');

	    html2canvas(card, { canvas: canvas }).then(function() {
	        var image = canvas.toDataURL('image/jpeg');

	        var link = document.createElement('a');
	        link.href = image;
	        link.download = 'card_image.jpg';
	        link.click();
	    });
	});


   $('#searchCard').click(function() {

    var search = $('#searchData').val();
	    
	    if (search === '') {
	        alert('Value is empty. Please enter a search card name.');
	    } else {
	        $.ajax({
	            url: pageUrl + "/files/requestPage.php",
	            method: 'post',
	            data: {
	                'searchCard': 'searchCard',
	                'searchValue': search
	            },
	            success: function(response) {
	                var response=$.parseJSON(response);

					if (response.success) 
					{
						if (response.url) 
						{
							window.location=response.url;
						}
					}
					else if(response.error)
					{
						if (response.url) 
						{
							window.location=response.url;
						}

						display.html('<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">'+response.message+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button></div>');
					}
	            }
	        });
	    }
	});


    interact('.draggable')
        .draggable({
          modifiers: [
            interact.modifiers.restrictRect({
              restriction: 'parent',
              endOnly: true
            })
          ],
          listeners: {
            move: dragMoveListener
          }
        })
        .resizable({
          edges: { right: true, bottom: true },
          modifiers: [
            interact.modifiers.restrictSize({
              min: { width: 100, height: 50 }
            }),
            interact.modifiers.restrictRect({
              restriction: '.printable-content',
              endOnly: true
            })
          ],
          listeners: {
            move: resizeMoveListener
          }
        });

      function dragMoveListener(event) {
        const { target } = event;
        const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
        const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

        target.style.transform = `translate(${x}px, ${y}px)`;

        target.setAttribute('data-x', x);
        target.setAttribute('data-y', y);
      }

      function resizeMoveListener(event) {
        const { target } = event;
        const x = parseFloat(target.getAttribute('data-x')) || 0;
        const y = parseFloat(target.getAttribute('data-y')) || 0;

        target.style.width = `${event.rect.width}px`;
        target.style.height = `${event.rect.height}px`;

        target.setAttribute('data-x', x);
        target.setAttribute('data-y', y);
      }

      


	function submitForm(form)
	{
		var footer=$('.msgShow');

		footer.html('<center><img src='+pageUrl+"/files/ajax-loader.gif alt='Loader'></center>");
		var file1=form.get(0).image;
		if (file1===undefined || file1==null || file1==='') 
		{	
			$.ajax({
			url:form.attr('action'),
			method:form.attr('method'),
			data:form.serialize(),
			success:function(response){
				show_message(response,footer);
			}

	      });

		}
		else
		{
			var formData = new FormData($(form)[0]);

			$.ajax({
				method:form.attr('method'),
				url:form.attr('action'),
				data:formData,
				success:function(response){
					show_message(response,footer);
				},
				cache: false,
			    contentType: false,
			    processData: false,

			});
	   }		
	}

	function show_message(response,display)
	{
		var response=$.parseJSON(response);

		if (response.success) 
		{
			if (response.signout)
			{
				setTimeout(function(){
					window.location.reload();
				},2000);
			}
			else if (response.url) 
			{
				setTimeout(function(){
					window.location=response.url;
				},2000);
			}

			display.html('<div class="alert alert-success alert-dismissible fade show d-flex justify-content-center" role="alert">'+response.message+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button></div>');
		}
		else if(response.error)
		{
			if (response.url) 
			{
				setTimeout(function(){
					window.location=response.url;
				},2000);
			}

			display.html('<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">'+response.message+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button></div>');
		}
	}
});


function copyLink(element)
{
	 var link=pageUrl+"/"+$(element).attr('link');
    navigator.clipboard.writeText(link);
    // Alert the copied text
    alert('Link Copy');
}