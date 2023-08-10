<script>
    $(".question-response-rows").click(function(){var e=$(this).data("question"),n=".question-"+e;$(".question").addClass("hidden"),$(n).removeClass("hidden"),$("input[name=currentQuestionNumber]").val(e),$("#current-question-number-label").text(e),$("#back-to-prev-question").removeClass("disabled"),$("#go-to-next-question").removeClass("disabled")});var examWizard=$.fn.examWizard({finishOption:{enableModal:!0}});
    
    @if ($waktu_ujian->selesai == null)

        $("input[type=radio]").click(function(){var a="soalId"+$(this).attr("name");$("#"+a).removeClass("btn-white"),$("#"+a).addClass("btn-info"),$("#"+a).addClass("text-white");var t=$(this).attr("name"),s=$(this).data("pg_siswa"),a=$(this).val();$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{idDetail:t,id_pg:s,jawaban:a,_token:"{{ csrf_token() }}"},async:!0,url:"{{ url('/siswa/belajar/simpan_pg') }}",success:function(a){console.log(a)}})});

        $(".ragu").click(function(){var a,s="soalId"+$(this).data("mark_name");$(this).is(":checked")?($("#"+s).removeClass("btn-white"),$("#"+s).addClass("btn-warning"),a=$(this).data("id_pg"),$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{ragu:1,id_pg:a,_token:"{{ csrf_token() }}"},async:!0,url:"{{ url('/siswa/ragu_pg') }}",success:function(a){console.log(a)}})):($("#"+s).removeClass("btn-warning"),$("#"+s).hasClass("btn-info")?$("#"+s).removeClass("btn-white"):$("#"+s).addClass("btn-white"),a=$(this).data("id_pg"),$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{ragu:null,id_pg:a,_token:"{{ csrf_token() }}"},async:!0,url:"{{ url('/siswa/ragu_pg') }}",success:function(a){console.log(a)}}))});

        $("#back-to-prev-question").click(function(){var e=$("input[name=currentQuestionNumber]").val(),a=parseInt(e)-parseInt(1),e="ragus-"+a;0!=a&&($(".ragus").addClass("hidden"),$("."+e).removeClass("hidden"))});
        
        $(".kirim-jawaban").on("click",function(a){a.preventDefault(),swal({title:"apakah kamu yakin?",text:"pastikan anda sudah menjawab soal dengan benar!",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:"ya, kirim",padding:"2em"}).then(function(a){a.value&&$("#examwizard-question").submit()})});
    @endif
</script>