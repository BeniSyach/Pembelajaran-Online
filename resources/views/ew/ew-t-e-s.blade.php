<script>
    $("input[name=nilai]").change(function(){var a=$(this).val(),i=$(this).data("id");$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"post",data:{nilai:a,id:i},async:!0,url:"{{ url('/guru/nilai_essay') }}",success:function(a){console.log(a)}})});
    var examWizard=$.fn.examWizard({finishOption:{enableModal:!0}});$(".question-response-rows").click(function(){var e=$(this).data("question"),n=".question-"+e;$(".question").addClass("hidden"),$(n).removeClass("hidden"),$("input[name=currentQuestionNumber]").val(e),$("#current-question-number-label").text(e),$("#back-to-prev-question").removeClass("disabled"),$("#go-to-next-question").removeClass("disabled")});
</script>