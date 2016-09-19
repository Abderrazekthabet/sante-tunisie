// call this from the developer console and you can control both instances
var calendars = {};
var date = '';
$(document).ready(function () {

    // assuming you've got the appropriate language files,
    // clndr will respect whatever moment's language is set to.
    // moment.lang('ru');

    // here's some magic to make sure the dates are happening this month.
    var thisMonth = moment().format('YYYY-MM');

    var eventArray = [
    { startDate: thisMonth + '-10', endDate: thisMonth + '-14', title: 'Multi-Day Event' },
    { startDate: thisMonth + '-21', endDate: thisMonth + '-23', title: 'Another Multi-Day Event' }
  ];

    // the order of the click handlers is predictable.
    // direct click action callbacks come first: click, nextMonth, previousMonth, nextYear, previousYear, or today.
    // then onMonthChange (if the month changed).
    // finally onYearChange (if the year changed).

    calendars.clndr1 = $('.cal1').clndr({
        events: eventArray,
        // constraints: {
        //   startDate: '2013-11-01',
        //   endDate: '2013-11-15'
        // },
        clickEvents: {
            click: function (target) {
                date = target.date._i;
                /********** Day Number **********/
                /**************** Script Extract Day********************/
                var init_day = String(target.date).substr(0, 3);
                switch (init_day) {
                    case 'dim':
                        init_day = 'Dimanche';
                        break;
                    case 'lun':
                        init_day = 'Lundi';
                        break;
                    case 'mar':
                        init_day = 'Mardi';
                        break;
                    case 'mer':
                        init_day = 'Mercredi';
                        break;
                    case 'jeu':
                        init_day = 'Jeudi';
                        break;
                    case 'ven':
                        init_day = 'Vendredi';
                        break;
                    case 'sam':
                        init_day = 'Samedi';
                        break;
                    default: init_day = 'undefined';
                }
                /****************!Script Extract Day********************/

                document.getElementById('dayRec').innerHTML = init_day;

                document.getElementById('NdayRec').innerHTML = target.date._i.substr(8, 2);


                /*************** Script check if > ******************/

                var Currentyear = moment().year();
                var Selectedyear = target.date._i.substr(0, 4);

                //alert(Currentday > Selectedday);
                if (Selectedyear >= Currentyear) {
                    var Currentmonth = moment().month() + 1;
                    var Selectedmonth = target.date._i.substr(5, 2);
                    if (Selectedmonth >= Currentmonth) {
                        var Currentday = moment().date();
                        var Selectedday = target.date._i.substr(8, 2);
                        
                        if (Selectedday > Currentday) {
                            document.getElementById('AddEventButton').setAttribute('class', 'button');
                            $("#dayDisplay").slideDown();
                        }
                        else if((Selectedday < Currentday) && (Selectedmonth > Currentmonth)){
                            document.getElementById('AddEventButton').setAttribute('class', 'button');
                            $("#dayDisplay").slideDown();
                        }
                        else {
                            document.getElementById('AddEventButton').setAttribute('class', 'buttonDisable');
                            $("#dayDisplay").slideDown();
                        }
                    }
                    else {
                        document.getElementById('AddEventButton').setAttribute('class', 'buttonDisable');
                        $("#dayDisplay").slideDown();
                    }
                }
                else {
                    document.getElementById('AddEventButton').setAttribute('class', 'buttonDisable');
                    $("#dayDisplay").slideDown();
                }

                /************** !Script check if > ******************/

                $("#dayDisplay").slideDown();

                console.log(target);
                console.log(target.date._d);
                //document.getElementById('add_something_container_event').style = 'display:inline;';
                if ($(target.element).hasClass('inactive')) {
                    console.log('not a valid datepicker date.');
                } else {
                    console.log('VALID datepicker date.');
                }
            },
            nextMonth: function () {
                console.log('next month.');
            },
            previousMonth: function () {
                console.log('previous month.');
            },
            onMonthChange: function () {
                console.log('month changed.');
            },
            nextYear: function () {
                console.log('next year.');
            },
            previousYear: function () {
                console.log('previous year.');
            },
            onYearChange: function () {
                console.log('year changed.');
            }
        },
        multiDayEvents: {
            startDate: 'startDate',
            endDate: 'endDate'
        },
        showAdjacentMonths: true,
        adjacentDaysChangeMonth: false

    });


    // calendars.clndr2 = $('.cal2').clndr({
    //   template: $('#template-calendar').html(),
    //   events: eventArray,
    //   startWithMonth: moment().add('month', 1),
    //   clickEvents: {
    //     click: function(target) {
    //       console.log(target);
    //     }
    //   }
    // });

    // bind both clndrs to the left and right arrow keys
    $(document).keydown(function (e) {
        if (e.keyCode == 37) {
            // left arrow
            calendars.clndr1.back();
            //calendars.clndr2.back();
        }
        if (e.keyCode == 39) {
            // right arrow
            calendars.clndr1.forward();
            //calendars.clndr2.forward();
        }
    });

});


 $(document).ready(function(){
							  $(".AddEvent").click(function(){
				document.getElementById('datedate').innerHTML = date;
				$("#divForm").html('<input type="hidden" id="date" name="date" value="'+date+'"/>'
			+'<h5>&nbsp;&nbsp;&nbsp;Nom de l\'événement: </h5><input type="text" id="nom" name="nom"  class="add_something_container" /> '
			+'<h5>&nbsp;&nbsp;&nbsp;Thème: </h5><input type="text" id="theme" name="theme"  class="add_something_container" />'
			+'<h5>&nbsp;&nbsp;&nbsp;Type: </h5>'
			+'<select name="type" id="type" class="select_control">'
			+'<option value="Conférence" selected="selected">Conférence</option>'
			+'<option value="Parcours santé" >Parcours Santé</option>'
			+'<option value="Acte de charité">Acte de charité</option>'
			+'<option value="Fête" >Fête</option>'
			+'</select>'
   			+'<h5>&nbsp;&nbsp;&nbsp;Public visé: </h5>'
            +'<div id="checkcheck">'
			+'<label><input type="checkbox" id="tous" name="tous" onChange="CheckAll()"/>Tous </label>'
            +'<label><input type="checkbox" id="etudiant" name="etudiant" value="Etudiants"/> Etudiants </label>'
			+'<label><input type="checkbox" id="chercheur" name="chercheur" value="Chercheurs"/>Chercheurs </label>'
			+'<label><input type="checkbox" id="entreprise" name="entreprise" value="Entreprises"/>Entreprises </label>'
			+'<label><input type="checkbox" id="professionnel" name="professionnel" value="Professionnels"/>Professionnels </label>'
			+'<label><input type="checkbox" id="medias" name="medias" value="Médias"/>Médias </label>'
            +'</div>'
			+'<h5>&nbsp;&nbsp;&nbsp;Lieu: </h5><input type="text" id="lieu" name="lieu" />'
			+'<h5>&nbsp;&nbsp;&nbsp;Description: </h5><textarea id="description" name="description"></textarea>'
			+'<input type="button" value="Enregistrer"  onClick ="verifierTout_Event()" class="buttonE"/>');
			
								$("#add_something_container_event").slideDown();
							  
								$('html, body').animate({  
									scrollTop:$(add_something_container_event).offset().top  
								}, 'slow');  
								return false; 
							  });
							});