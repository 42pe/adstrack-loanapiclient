
function showJointApplicantTab(el) {
    $secondary = $('.secondary-applicant');
    $secondary.each(function(e) {
        $div = $($secondary)[e];
        $($div).removeClass("disabled");
    });
}

function hideJointApplicantTab(el) {
    $secondary = $('.secondary-applicant');
    $secondary.each(function(e) {
        $div = $($secondary)[e];
        $($div).addClass("disabled");
    });
}

function swapBottom(flag) {
    if (flag == "off") {
        $('#bottom-1').show();
        $('#bottom-2').hide();
        $('.tab-pane').show();
        $('.next-step').show();
    } else {
        $('#bottom-1').hide();
        $('.tab-pane').hide();
        $('#bottom-2').show();
        $('.next-step').hide();
        $('.prev-step').hide();
    }
}

function nextTab(el) {
    $nextTab = $(el).next('div');
    if(!$($nextTab).hasClass("tab-pane") || $($nextTab).hasClass("disabled")) {
        swapBottom("on");
        return false;
    }
    $(el).removeClass("active");
    $($nextTab).addClass("active");
}

function prevTab(el) {
    $prevTab = $(el).prev('div');
    if (!$($prevTab).hasClass("tab-pane")) {
        return false;
    }
    swapBottom("off");
    $(el).removeClass("active");
    $($prevTab).addClass("active");
}


$(document).ready(function() {
    $('.prev-step').hide();
    $('.nav-tabs > li a[title]').tooltip();

    $('.next-step').on("click", function(e) {
        $('.prev-step').show();
        var $inputs = $('.tab-content .active').find("input");
        var $selects = $('.tab-content .active').find("select");
        var valid = true;

        $inputs.each(function() {
            if(!$(this).valid() && valid) {
                valid = false;
            }
        });
        $selects.each(function() {
            if(!$(this).valid() && valid) {
                valid = false;
            }
        });

        if (valid === false) {
            return false;
        }
        var $active=$('.tab-content > .tab-pane.active');
        nextTab($active);
    });
    $('.prev-step').on("click", function(e) {
        var $active = $('.tab-content > .tab-pane.active');
        prevTab($active);
    });

    $('input[name=ApplicationType]').on('change', function(e) {
        if($('input[name="data[ApplicationType]"]:checked').val() == 'Joint') {
            showJointApplicantTab(e);
        } else {
            hideJointApplicantTab(e);
        }
    });

    $("[data-hide]").on("click", function(e) {
        $('.alert').addClass("collapse");
        $('.alert').alert('hide');
    });

    //use link to submit form instead of button
    $("a[id=submit]").click(function() {
        $(this).parents("form").submit();
    });

    $('[data-toggle="tooltip"]').tooltip();
    $('form').validate();
});