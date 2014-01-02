//this function should be called every time we load a partial view
//complete view. This shall instantiate various components for
//pages to work properly, including the UI components
function initComponents() {
    $(function () {
        //initialize datepicker component

        $(".datetime-input,.date-input").datepicker({
            format:"yyyy-mm-dd",
            autoclose:true,
            todayBtn:true,
            todayHighlight:true
        });
    });
}