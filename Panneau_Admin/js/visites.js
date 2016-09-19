function visitesPharm()
{
    // Initialize card flip
    $('.card.hover').hover(function ()
    {
        $(this).addClass('flip');
    }, function ()
    {
        $(this).removeClass('flip');
    });

    // Make card front & back side same
    $('.card').each(function ()
    {
        var front = $('.card .front');
        var back = $('.card .back');
        var frontH = front.height();
        var backH = back.height();


        if (backH > frontH)
        {
            front.height(backH - 8);
        }
    });

    //generate pie charts
    $('.easypiechart').easyPieChart();


    //update instance every 5 sec
    window.setInterval(function ()
    {

        //refresh every pie chart
        $('.easypiechart').each(function ()
        {
            $(this).data('easyPieChart').update(Math.floor(100 * Math.random()));
        });

    }, 5000);

}