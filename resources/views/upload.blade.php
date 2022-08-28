@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload file contains json') }}</div>

                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                          <label for="FormControlFile1">Json file input</label>
                          <input type="file" class="form-control-file" id="file">
                        </div>
                        <button type="button" id='update_purchase_status_form' class="btn btn-primary">Submit</button>

                      </form>
                      <pre>
                        <code id="code">
                        </code>
                    </pre>
                      <ul id='errors' style="color:red;"></ul>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #code{
    left: 10px;
    top: 10px;
    position: absolute;
    display: none;
    }
</style>
<script>
        $("#update_purchase_status_form").click(function(e){
            e.preventDefault(); // <==stop page refresh==>
            var formData = new FormData();
            formData.append('file', $('#file')[0].files[0]); // <==append file to formData==>
            $('#code').hide(); // <==hide code tag==>
            
            $.ajax({
                type: "POST", // <==request method==>
                url: "api/upload", // <==request url==>
                data: formData,
                processData: false, 
                contentType: false, 
                success: function(msg){ // <==on success==>
                    $("#code").html(JSON.stringify(msg));
                    $('#code').show();
                },
                error: function(XMLHttpRequest) {  // <==on failed==>
                    obj = JSON.parse(XMLHttpRequest.responseText);
                    $("#errors").html("");
                    for (const key in obj.message) {
                        console.log(obj.message[key][0]);
                        $("#errors").append("<li>"+obj.message[key][0]+"</li>");
                    }
                }
            });
        });
        
        
</script>
@endsection
