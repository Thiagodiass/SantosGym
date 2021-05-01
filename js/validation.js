
$(document).ready(e=>{

    $('#bookForm').submit(function(e) {
        console.log('Form Submitted');

        let maromba = $('#maromba').val(),
        instructor = $('#instructor').val(),
        typePlan = $('#typePlan').val(),
        status = $('#status').val(),
        start_date = $('#start_date').val(),
        expire_date = $('#expire_date').val();

        $('#nameError').text('');
        $('#authorError').text('');
        $('#isbnError').text('');
        $('#publishedError').text('');

        let valid = true;

        if(name === '' || name==='undefined'){

            valid = false;
            $('#nameError').text("Name is invalid");

        }
        if(author === '' || author==='undefined'){
            valid = false;
            $('#authorError').text("Author is invalid");
        }
        if(isbn === '' || isbn==='undefined'){
            valid = false;
            $('#isbnError').text("ISBN is invalid");;
        }
        if(published_date === '' || published_date==='undefined'){
            var regex = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

            if(!regex.test(published_date)){
                valid = false;  
                console.log('Regex is false');        
                $('#publishedError').text("Published date is invalid");
            }
        }

        if(!valid){
            e.preventDefault();
        }
     });
    
});