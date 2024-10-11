<script>
    $(".question-response-rows").click(function(){var e=$(this).data("question"),n=".question-"+e;
    
    $(".question").addClass("hidden"),$(n).removeClass("hidden"),$("input[name=currentQuestionNumber]").val(e),
    
    $("#current-question-number-label").text(e),$("#back-to-prev-question").removeClass("disabled"),
    
    $("#go-to-next-question").removeClass("disabled")});var examWizard=$.fn.examWizard({finishOption:{enableModal:!0}});

    @if ($waktu_ujian_essay->selesai == null)

        $("textarea").change(function(){var a="soalId"+$(this).attr("name");$("#"+a).removeClass("btn-white"),
        
        $("#"+a).addClass("btn-info"),$("#"+a).addClass("text-white");var s=$(this).attr("name"),t=$(this).data("essay_siswa"),a=$(this).val();$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{idDetail:s,id_essay:t,jawaban:a,_token:"{{ csrf_token() }}"},async:!0,url:"{{ url('/siswa/belajar/simpan_essay') }}",success:function(a){console.log(a)}})});

        $(".ragu").click(function(){var s,a="soalId"+$(this).data("mark_name");$(this).is(":checked")?($("#"+a).removeClass("btn-white"),$("#"+a).addClass("btn-warning"),s=$(this).data("id_essay"),$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{ragu:1,id_essay:s,_token:"{{ csrf_token() }}"},async:!0,url:"{{ url('/siswa/ragu_essay') }}",success:function(s){console.log(s)}})):($("#"+a).removeClass("btn-warning"),$("#"+a).hasClass("btn-info")?$("#"+a).removeClass("btn-white"):$("#"+a).addClass("btn-white"),s=$(this).data("id_essay"),$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{ragu:null,id_essay:s,_token:"{{ csrf_token() }}"},async:!0,url:"{{ url('/siswa/ragu_essay') }}",success:function(s){console.log(s)}}))});

        $("#back-to-prev-question").click(function(){var e=$("input[name=currentQuestionNumber]").val(),a=parseInt(e)-parseInt(1),e="ragus-"+a;0!=a&&($(".ragus").addClass("hidden"),$("."+e).removeClass("hidden"))});

        $(".kirim-jawaban_essay").on("click",function(a){a.preventDefault(),swal({title:"apakah kamu yakin?",text:"pastikan anda sudah menjawab soal dengan benar!",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:"ya, kirim",padding:"2em"}).then(function(a){a.value&&$("#examwizard-question_essay").submit()})});

    @endif
    </script>