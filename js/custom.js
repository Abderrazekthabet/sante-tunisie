
// JavaScript Document

function setDivMedic(x)
    {
        var Nom = document.getElementById("NomMed"+x).value;
        var Categ = document.getElementById("CategMed"+x).value;
        var Desc = document.getElementById("DescMed"+x).value;
        var Img = document.getElementById("ImgMed"+x).value;
        var Visites = document.getElementById("VisitesMed"+x).value;

        
        document.getElementById("rechForm").style.width = "50%";

        $('#affichRech').fadeIn('slow');

        document.getElementById("nomMedic").innerHTML = Nom;
        document.getElementById("categMedic").innerHTML = Categ;
        document.getElementById("imgMedic").setAttribute("src", Img);
        document.getElementById("descMedic").innerHTML = Desc; 
        document.getElementById("VisitesMed").innerHTML = Visites;  
        
    }

    $(document).ready(function ()
    {
        $("#affichRech").hide();
        //$("#panneau").hide();
        // Icon Click Focus
        $('.icon').click(function ()
        {
            $('#search').focus();
        });
        /*
        var input = $("<input>").appendTo('body')
                            .css({ position: "absolute",
                                left: -500,
                                top: -500
                            });

        $('body').bind({ keydown: function (e)
        {
            input.focus();
        },

            keyup: function ()
            {
                var value = input.val();

                if (value == "abcde")
                {
                    $("#panneau").fadeIn("slow");
                    $('html,body').animate({ scrollTop: $(panneau).offset().top }, 'slow');
                    $("#panneau").effect("shake");
                }
            }
        });
        */

        // Live Search
        // On Search Submit and Get Results
        function search()
        {
            var query_value = $('#search').val();
            $('#search-string').html(query_value);
            if (query_value !== '')
            {
                $.ajax({
                    type: "POST",
                    url: "config/search.php",
                    data: { query: query_value },
                    cache: false,
                    success: function (html)
                    {
                        $("#results").html(html);
                    }
                });
            } return false;
        }

        $("#search").live("keyup", function (e)
        {
            // Set Timeout
            clearTimeout($.data(this, 'timer'));

            // Set Search String
            var search_string = $(this).val();

            // Do Search
            if (search_string == '')
            {
                $("#results").fadeOut();
                $('#results-text').fadeOut();
                $("#affichRech").hide();
                document.getElementById("rechForm").style.width = "100%";
            }
            else
            {
                $("#results").fadeIn();
                $('#results-text').fadeIn();
                $(this).data('timer', setTimeout(search, 100));
            }

        });

    });