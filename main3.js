var newMsgAudio;
function newCrewFeedMsg() {
    if (muteSound)return;
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("mobile") > -1;
    if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/) == false && isAndroid == false) {
        newMsgAudio = document.createElement('audio');
        newMsgAudio.setAttribute('src', 'sounds/crewfeedalert.wav');
        $.get();
        newMsgAudio.addEventListener("load", function () {
            newMsgAudio.play();
        }, true);
        newMsgAudio.volume = 0.25;
        newMsgAudio.play();
    }
}
$(document).on("keydown", function (evt) {
    if (!evt) evt = event;
    if (evt.altKey && evt.keyCode == 83) {
        document.getElementById('search').select();
        search(document.getElementById('search').value);
    }
    if (evt.altKey && evt.keyCode == 78) {
        document.getElementById('crewFeedMessage').select();
    }
    if (currentSelection != 0) {
        if ((evt.shiftKey && evt.keyCode == 9) || (evt.keyCode == 38)) {
            evt.preventDefault();
            if (currentSelection > 1) {
                var oldSelection = "#" + currentSelection;
                var newSelection = "#" + (currentSelection - 1);
                $(oldSelection).removeClass("searchFloatPseudo");
                $(newSelection).addClass("searchFloatPseudo");
                currentSelection--;
            }
        }
        else if (evt.keyCode == 9 || evt.keyCode == 40) {
            evt.preventDefault();
            var oldSelection = "#" + currentSelection;
            var newSelection = "#" + (currentSelection + 1);
            if ($(newSelection).length > 0) {
                $(oldSelection).removeClass("searchFloatPseudo");
                $(newSelection).addClass("searchFloatPseudo");
                currentSelection++;
            }
        }
        if (evt.keyCode == 13) {
            location.href = document.getElementById(currentSelection).getAttribute("href");
        }
    }
});
$(document).ready(function () {
    // crewfeed();
    if (!("placeholder" in document.createElement("input"))) {
        $("input[placeholder], textarea[placeholder]").each(function () {
            var val = $(this).attr("placeholder");
            if (this.value == "") {
                this.value = val;
            }
            $(this).focus(function () {
                if (this.value == val) {
                    this.value = "";
                }
            }).blur(function () {
                if ($.trim(this.value) == "") {
                    this.value = val;
                }
            })
        });
        $('form').submit(function () {
            $(this).find("input[placeholder], textarea[placeholder]").each(function () {
                if (this.value == $(this).attr("placeholder")) {
                    this.value = "";
                }
            });
        });
    }
});
var timeout;
var tmpSearch;
var Ts;
$(document).ready(function () {
    $("#search").on('input', function (e) {
        if (Ts != document.getElementById('search').value) {
            if (document.getElementById('search').value.length > 0) {
                $('#searchResults').fadeIn(175, function () {
                    document.getElementById('searchResults').innerHTML = '<img src="layout_images/ajax-loader.gif" class="loader">';
                });
            }
            window.clearTimeout(timeout);
            timeout = window.setTimeout(function () {
                search(document.getElementById('search').value);
            }, 275);
        }
        Ts = document.getElementById('search').value;
    });
});
function reClick() {
    if (document.getElementById('search').value.length > 0) {
        $('#searchResults').fadeIn(175, function () {
            document.getElementById('searchResults').innerHTML = '<img src="layout_images/ajax-loader.gif" class="loader">';
        });
    }
    window.clearTimeout(timeout);
    timeout = window.setTimeout(function () {
        search(document.getElementById('search').value);
    }, 275);
}

var currentSelection = 0;
function search(text) {

    $.post("find.php", { users: text},
        function(data){
            document.getElementById('searchResults').innerHTML = data;
            document.getElementById('1').className = 'searchFloatPseudo';
            // $("#searchResults").html(data);
    });
}

$(document).on('DOMMouseScroll mousewheel', '.preventscroll', function (ev) {
    var $this = $(this), scrollTop = this.scrollTop, scrollHeight = this.scrollHeight, height = $this.height(),
        delta = (ev.type == 'DOMMouseScroll' ? ev.originalEvent.detail * -12 : ev.originalEvent.wheelDelta),
        up = delta > 0;
    var prevent = function () {
        ev.stopPropagation();
        ev.preventDefault();
        ev.returnValue = false;
        return false;
    }
    if (!up && -delta > scrollHeight - height - scrollTop) {
        $this.scrollTop(scrollHeight);
        return prevent();
    }
    else if (up && delta > scrollTop) {
        $this.scrollTop(0);
        return prevent();
    }
});
$(document).click(function (event) {
    var firstParent = event.target.parentNode;
    var secondParent = firstParent.parentNode;
    var thirdParent = secondParent.parentNode;
    if (!firstParent || !secondParent || !thirdParent) {
        $('#searchResults').fadeOut(175, function () {
            document.getElementById('searchResults').innerHTML = '<img src="layout_images/ajax-loader.gif" class="loader">';
        });
        $('#notificationDiv').fadeOut(100);
        $('.updateCasino').fadeOut(100);
    }
    if (event.target.id != 'toggleNot' && event.target.parentNode.id != 'toggleNot') {
        var notificationDisp = document.getElementById('notificationDiv').style.display;
        if (firstParent.id != 'notificationDiv' && firstParent.id != 'notificationsNo' && secondParent.id != 'notificationDiv' && secondParent.id != 'notificationsNo' && thirdParent.id != 'notificationDiv' && thirdParent.id != 'notificationsNo') {
            if (notificationDisp == 'block' || notificationDisp == 'inline-block') {
                $('#notificationDiv').fadeOut(100);
            }
        }
    }
    if (event.target.id != 'search' && event.target.parentNode.id != 'searchBox') {
        var searchResultDisp = document.getElementById('searchResults').style.display;
        if (firstParent.id != 'searchResults' && secondParent.id != 'searchResults' && thirdParent.id != 'searchResults') {
            if (searchResultDisp == 'block' || searchResultDisp == 'inline-block') {
                $('#searchResults').fadeOut(100, function () {
                    document.getElementById('searchResults').innerHTML = '<img src="layout_images/ajax-loader.gif" class="loader">';
                });
            }
        }
    }
    var test1 = event.target.id.replace(/[0-9]/g, '');
    var test2 = event.target.parentNode.id.replace(/[0-9]/g, '');
    if (test1 != 'casino' && test2 != 'casino') {
        if (test1 != 'casinoClick' && test2 != 'casinoClick') {
            if (test1 != 'casinoLoader' && test2 != 'casinoLoader') {
                $('.updateCasino').fadeOut(100);
            }
        }
    }
});

function selectCasino(casinoID) {
    var casinoIDEl = '#' + casinoID;
    if ((document.getElementById(casinoID).style.display) == '' || (document.getElementById(casinoID).style.display) == 'none') {
        $('.updateCasino').fadeOut(100);
        $(casinoIDEl).fadeIn(100);
    }
    else {
        $(casinoIDEl).fadeOut(100);
    }
}

function openNotifications_original() {
    $('#clearNotifications').hide();
    if ((document.getElementById('notificationDiv').style.display) == '' || (document.getElementById('notificationDiv').style.display) == 'none') {
        document.getElementById('notificationDivContent').innerHTML = '<img src="layout_images/ajax-loader.gif" class="loader">';
        $('#notificationDiv').fadeIn(100, function () {
            document.getElementById('notificationDivContent').scrollTop = 0;
        });
        $.post('includes/notifications.php', {
            action: 1
        }).done(function (data) {
            document.getElementById('notificationDivContent').innerHTML = data;
            $('#clearNotifications').show();
            liveUpdates();
        });
    } else {
        $('#notificationDiv').fadeOut(100);
    }
    $('.updateCasino').fadeOut(100);
}





function openNotifications() {
    $('#clearNotifications').show();
    document.getElementById('toggleNot').classList.remove('alert');
    document.getElementById('notificationText').innerHTML='No';
    document.getElementById('notificationText').style.color='white';
    if ((document.getElementById('notificationDiv').style.display) == '' || (document.getElementById('notificationDiv').style.display) == 'none') {
        $('#notificationDiv').fadeIn(100, function () {
            document.getElementById('notificationDivContent').scrollTop = 0;
        });
    } else {
        $('#notificationDiv').fadeOut(100);
    }
    $('.updateCasino').fadeOut(100);
}
function clearNotifications() {
    $.ajax({
        url: "oknotification.php",
    });
    document.getElementById('notificationDivContent').innerHTML = '<p>You have no notifications at this time.</p>';
    document.getElementById('toggleNot').classList.remove('alert');
    document.getElementById('notificationText').innerHTML='No';
    document.getElementById('notificationText').style.color='white';
}
var oldID = "ip1";
function getRelated(ip, id) {
    var postData = "q=" + ip;
    var ipID = '#' + id;
    document.getElementById('miniLoader').style.display = 'block';
    document.getElementById(id).style.backgroundColor = '#434343';
    var list = document.getElementsByClassName("ipLinks");
    for (var i = 0; i < list.length; i++) {
        if (list[i].style.backgroundColor != 'rgb(67, 67, 67)') {
            list[i].style.backgroundColor = '';
        }
    }
    $.ajax({
        type: "POST", url: "includes/relatedaccounts.php", data: postData, timeout: 2000, success: function (msg) {
            document.getElementById(id).style.backgroundColor = '#444444';
            oldID = id;
            document.getElementById('relatedToDiv').innerHTML = msg;
            document.getElementById('relatedTo').innerHTML = ip;
            document.getElementById('miniLoader').style.display = 'none';
        }, error: function (XMLHttpRequest, textStatus, errorThrown) {
            var list = document.getElementsByClassName("ipLinks");
            for (var i = 0; i < list.length; i++) {
                list[i].style.backgroundColor = '';
            }
            document.getElementById(oldID).style.backgroundColor = '#444444';
            document.getElementById('miniLoader').style.display = 'none';
            alert('Connection Error. Please try again.');
        }
    });
}
var openNotes = 0;
function rotateArrow() {
    if (document.getElementById("arrow").src.toString().match("down")) {
        openNotes = 0;
    }
    else {
        openNotes = 1;
    }
    if (openNotes == 1) {
        $("#arrow").fadeTo(200, 0.6, function () {
            document.getElementById("arrow").src = "images/down.png";
            $("#arrow").fadeTo("fast", 1);
        });
    } else {
        $("#arrow").fadeTo(200, 0.6, function () {
            document.getElementById("arrow").src = "images/up.png";
            $("#arrow").fadeTo("fast", 1);
        });
    }
    $('#mynotes').animate({height: "toggle", opacity: "toggle"}, 175, function () {
        document.getElementById('note').select();
    });
}
var isAvOpen = 0;
function openAvatar() {
    isAvOpen = 1;
    $('#clickOff').fadeIn(250);
    $('#hoverDiv').fadeIn(250);
    return false;
}
$(document).keyup(function (e) {
    if (e.keyCode == 27 && isAvOpen == 1) {
        closeAvatar();
    }
});
function closeAvatar() {
    isAvOpen = 0;
    $('#clickOff').fadeOut(0);
    $('#hoverDiv').fadeOut(0);
}
var isMsgFormOpen = 0;
function openMsgForm() {
    isMsgFormOpen = 1;
    $('#clickOff').fadeIn(125);
    $('#hoverDiv2').fadeIn(125);
    document.getElementById('msgOrComment').select();
}
$(document).keyup(function (e) {
    if (e.keyCode == 27 && isMsgFormOpen == 1) {
        closeMsgForm();
    }
});
function closeMsgForm() {
    isMsgFormOpen = 0;
    $('#clickOff').fadeOut(0);
    $('#hoverDiv2').fadeOut(0);
}
var isReportFormOpen = 0;
function openReportForm(userID, msgID) {
    isReportFormOpen = 1;
    $('#clickOff').fadeIn(250);
    $('#hoverDiv').fadeIn(250);
    document.getElementById('block_user_id').value = userID;
    document.getElementById('message_id').value = msgID;
    return false;
}
$(document).keyup(function (e) {
    if (e.keyCode == 27 && isReportFormOpen == 1) {
        closeReportForm();
    }
});
function closeReportForm() {
    isReportFormOpen = 0;
    $('#clickOff').fadeOut(0);
    $('#hoverDiv').fadeOut(0);
    document.getElementById('block_user_id').value = 0;
}
var isActivityOpen = 0;
function openActivity() {
    isActivityOpen = 1;
    $('#clickOff').fadeIn(150);
    $('#hoverDiv3').fadeIn(150);
    $("html body").css("overflow-y", "hidden");
    allAC();
}
$(document).keyup(function (e) {
    if (e.keyCode == 27 && isActivityOpen == 1) {
        closeActivity();
    }
});
function closeActivity() {
    isActivityOpen = 0;
    $('#clickOff').fadeOut(0);
    $('#hoverDiv3').fadeOut(0, function () {
        allAC();
        $("html body").css("overflow-y", "auto");
    });
}
function openTools() {
    $('#toolsToggle').fadeToggle(175);
    $('#myTools').fadeToggle(175);
    $('#username').select();
    return false;
}
var isAnswerFormOpen = 0;
function openAnswerForm(postID, question, postID) {
    document.getElementById('postID').value = postID;
    document.getElementById('question').innerHTML = question;
    document.getElementById('prevMessage').value = $(".js-form-" + postID).val();
    isAnswerFormOpen = 1;
    $('#clickOff').fadeIn(250);
    $('#hoverDiv').fadeIn(250);
    document.getElementById('msgOrComment').value = '';
    document.getElementById('msgOrComment').select();
    return false;
}
$(document).keyup(function (e) {
    if (e.keyCode == 27 && isAnswerFormOpen == 1) {
        closeAnswerForm();
    }
});
function closeAnswerForm() {
    isAnswerFormOpen = 0;
    $('#clickOff').fadeOut(0);
    $('#hoverDiv').fadeOut(0);
}
var isLikesOpen = 0;
function openLikes(commentIDVal) {
    document.getElementById('likedBy').innerHTML = '<center><img src="layout_images/ajax-loader.gif" class="loader"></center>';
    isLikesOpen = 1;
    $.post("likecomment.php", {topic: commentIDVal, viewlikes: true}).done(function (data) {
        document.getElementById('likedBy').innerHTML = data;
    });
    $('#clickOff').fadeIn(250);
    $('#hoverDiv').fadeIn(250);
}
$(document).keyup(function (e) {
    if (e.keyCode == 27 && isLikesOpen == 1) {
        closeLikes();
    }
});
function closeLikes() {
    isLikesOpen = 0;
    $('#clickOff').fadeOut(0);
    $('#hoverDiv').fadeOut(0, function () {
        document.getElementById('likedBy').innerHTML = '<center><img src="layout_images/ajax-loader.gif" class="loader"></center>';
    });
}
function addSmiley(smiley) {
    document.getElementById('msgOrComment').value = document.getElementById('msgOrComment').value + ' ' + smiley;
}
function addSmiley2(smiley) {
    document.getElementById('msgOrComment2').value = document.getElementById('msgOrComment2').value + ' ' + smiley;
}
function killsAC() {
    $('.js-activity-div').hide();
    $('.killsAc').show();
    if ($('.killsAc').length == 0) {
        $('.noAcToShow').show();
    }
}
function ranksAC() {
    $('.js-activity-div').hide();
    $('.ranksAc').show();
    if ($('.ranksAc').length == 0) {
        $('.noAcToShow').show();
    }
}
function achievementsAC() {
    $('.js-activity-div').hide();
    $('.achievementsAc').show();
    if ($('.achievementsAc').length == 0) {
        $('.noAcToShow').show();
    }
}
function casinosAC() {
    $('.js-activity-div').hide();
    $('.casinosAc').show();
    if ($('.casinosAc').length == 0) {
        $('.noAcToShow').show();
    }
}
function allAC() {
    $('.js-activity-div').show();
    $('.noAcToShow').hide();
    console.log($('.js-activity-div').length);
    if ($('.js-activity-div').length == 1) {
        $('.noAcToShow').show();
    }
}
$(document).on("mouseover", ".masterTooltip", function () {
    var title = $(this).attr('title');
    $(this).data('tipText', title).removeAttr('title');
    $('<p id="tt" class="tooltip"></p>').text(title).appendTo('body').fadeIn(250);
    var mousex = $(this).offset().left - $('#tt').outerWidth() - 10;
    var mousey = $(this).offset().top - 15;
    $('.tooltip').css({top: mousey, left: mousex});
    $('.tooltip').css("z-index", "5000000");
});
$(document).on("mouseout", ".masterTooltip", function () {
    $(this).attr('title', $(this).data('tipText'));
    $('.tooltip').remove();
});
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
var shiftPressed = false;
$(document).on('keyup keydown', function (e) {
    if (e.shiftKey == false) {
        shiftPressed = 0;
    } else {
        shiftPressed = 1;
    }
});
function addChips(i) {
    if (selectedChip == 0 && shiftPressed != 1) {
        var ua = navigator.userAgent.toLowerCase();
        var isAndroid = ua.indexOf("mobile") > -1;
        if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/) == false && isAndroid == false) {
            errorSelectChipsAudio = document.createElement('audio');
            errorSelectChipsAudio.setAttribute('src', 'sounds/error2.wav');
            $.get();
            errorSelectChipsAudio.addEventListener("load", function () {
                errorSelectChipsAudio.play();
            }, true);
            errorSelectChipsAudio.play();
        }
        $('#chipSet').fadeTo(100, 0.5, function () {
            $('#chipSet').fadeTo(80, 1, function () {
                $('#chipSet').fadeTo(80, 0.5, function () {
                    $('#chipSet').fadeTo(100, 1);
                });
            });
        });
        $('#tablePic').fadeTo(100, 0.5, function () {
            $('#tablePic').fadeTo(80, 1, function () {
                $('#tablePic').fadeTo(80, 0.5, function () {
                    $('#tablePic').fadeTo(100, 1);
                });
            });
        });
        $('.rouletteWheelHolder').fadeTo(100, 0.5, function () {
            $('.rouletteWheelHolder').fadeTo(80, 1, function () {
                $('.rouletteWheelHolder').fadeTo(80, 0.5, function () {
                    $('.rouletteWheelHolder').fadeTo(100, 1);
                });
            });
        });
    } else {
        var idCount = i + 'Count';
        var idCountVal = i + 'CountVal';
        var idColourVal = i + 'ColourVal';
        var idStakeSpan = '#' + i + 'Stake';
        var idTableChip = '#' + i + 'Chip';
        if (shiftPressed == 1) {
            if (document.getElementById(idCountVal).value > 0) {
                var ua = navigator.userAgent.toLowerCase();
                var isAndroid = ua.indexOf("mobile") > -1;
                if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/) == false && isAndroid == false) {
                    selectChipsAudio = document.createElement('audio');
                    selectChipsAudio.setAttribute('src', 'sounds/selectChip.wav');
                    $.get();
                    selectChipsAudio.addEventListener("load", function () {
                        selectChipsAudio.play();
                    }, true);
                    selectChipsAudio.play();
                }
                $(idStakeSpan).fadeOut(250);
                $(idTableChip).attr("src", '../images/casino/roulette/0Chip.png');
                window.setTimeout(function () {
                    document.getElementById('totalStake').innerHTML = '$' + numberWithCommas(parseInt(document.getElementById('totalStakeVal').innerHTML) - parseInt(document.getElementById(idCountVal).value));
                    document.getElementById('totalStakeVal').innerHTML = parseInt(document.getElementById('totalStakeVal').innerHTML) - parseInt(document.getElementById(idCountVal).value);
                    document.getElementById(idCount).innerHTML = '$' + 0;
                    document.getElementById(idCountVal).value = 0;
                    document.getElementById(idColourVal).value = 0;
                }, 250);
            }
        } else {
            if ((parseInt(document.getElementById('totalStakeVal').innerHTML) + parseInt(selectedChip)) > parseInt(maxbet_value)) {
                alert(maxBet);
            } else {
                var ua = navigator.userAgent.toLowerCase();
                var isAndroid = ua.indexOf("android") > -1;
                if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/) == false && isAndroid == false) {
                    addChipsAudio = document.createElement('audio');
                    addChipsAudio.setAttribute('src', 'sounds/chips.wav');
                    $.get();
                    addChipsAudio.addEventListener("load", function () {
                        addChipsAudio.play();
                    }, true);
                    addChipsAudio.play();
                }
                document.getElementById(i + 'Chip').src = chipURL;
                console.log(chipURL);
                $(idTableChip).fadeTo(100, 0.95, function () {
                    $(idTableChip).fadeTo(50, 1);
                });
                document.getElementById(idCount).innerHTML = '$' + numberWithCommas(parseInt(document.getElementById(idCountVal).value) + parseInt(selectedChip));
                document.getElementById(idCountVal).value = parseInt(selectedChip) + parseInt(document.getElementById(idCountVal).value);
                document.getElementById(idColourVal).value = chipNum;
                if (parseInt(document.getElementById(idCountVal).value) == parseInt(selectedChip)) {
                    $(idStakeSpan).fadeIn(200).css("display", "inline-block");
                } else {
                    $(idStakeSpan).fadeTo(75, 0.6, function () {
                        $(idStakeSpan).fadeTo(75, 1, function () {
                        });
                    });
                }
                document.getElementById('totalStake').innerHTML = '$' + numberWithCommas(parseInt(document.getElementById('totalStakeVal').innerHTML) + parseInt(selectedChip));
                document.getElementById('totalStakeVal').innerHTML = parseInt(document.getElementById('totalStakeVal').innerHTML) + parseInt(selectedChip);
            }
        }
    }
}
var selectedChip = 0;
var chipURL = "";
var chipNum = 0;
function selectChip(i, j) {
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("mobile") > -1;
    if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/) == false && isAndroid == false && j == 1) {
        selectChipsAudio = document.createElement('audio');
        selectChipsAudio.setAttribute('src', 'sounds/selectChip.wav');
        $.get();
        selectChipsAudio.addEventListener("load", function () {
            selectChipsAudio.play();
        }, true);
        selectChipsAudio.play();
    }
    var theIdOf = '#chip' + i;
    selectedChip = parseInt(i);
    $('.chipHolder').not(theIdOf).fadeTo(100, 0.6, function () {
        document.getElementById('chip').value = i;
        if (i == 5) {
            document.getElementById('chip5').style.opacity = 100;
            chipURL = "../images/casino/roulette/1Chip.png";
            chipNum = 1;
        } else if (i == 25) {
            document.getElementById('chip25').style.opacity = 100;
            chipURL = "../images/casino/roulette/1Chip.png";
            chipNum = 1;
        } else if (i == 100) {
            document.getElementById('chip100').style.opacity = 100;
            chipURL = "../images/casino/roulette/1Chip.png";
            chipNum = 1;
        } else if (i == 500) {
            document.getElementById('chip500').style.opacity = 100;
            chipURL = "../images/casino/roulette/1Chip.png";
            chipNum = 1;
        } else if (i == 2500) {
            document.getElementById('chip2500').style.opacity = 100;
            chipURL = "../images/casino/roulette/2Chip.png";
            chipNum = 2;
        } else if (i == 10000) {
            document.getElementById('chip10000').style.opacity = 100;
            chipURL = "../images/casino/roulette/2Chip.png";
            chipNum = 2;
        } else if (i == 50000) {
            document.getElementById('chip50000').style.opacity = 100;
            chipURL = "../images/casino/roulette/2Chip.png";
            chipNum = 2;
        } else if (i == 250000) {
            document.getElementById('chip250000').style.opacity = 100;
            chipURL = "../images/casino/roulette/2Chip.png";
            chipNum = 2;
        } else if (i == 500000) {
            document.getElementById('chip500000').style.opacity = 100;
            chipURL = "../images/casino/roulette/2Chip.png";
            chipNum = 2;
        } else if (i == 1000000) {
            document.getElementById('chip1000000').style.opacity = 100;
            chipURL = "../images/casino/roulette/3Chip.png";
            chipNum = 3;
        } else if (i == 2500000) {
            document.getElementById('chip2500000').style.opacity = 100;
            chipURL = "../images/casino/roulette/4Chip.png";
            chipNum = 4;
        } else if (i == 5000000) {
            document.getElementById('chip5000000').style.opacity = 100;
            chipURL = "../images/casino/roulette/5Chip.png";
            chipNum = 5;
        } else if (i == 25000000) {
            document.getElementById('chip25000000').style.opacity = 100;
            chipURL = "../images/casino/roulette/6Chip.png";
            chipNum = 6;
        } else if (i == 100000000) {
            document.getElementById('chip100000000').style.opacity = 100;
            chipURL = "../images/casino/roulette/7Chip.png";
            chipNum = 7;
        } else if (i == 500000000) {
            document.getElementById('chip500000000').style.opacity = 100;
            chipURL = "../images/casino/roulette/8Chip.png";
            chipNum = 8;
        } else if (i == 1000000000) {
            document.getElementById('chip1000000000').style.opacity = 100;
            chipURL = "../images/casino/roulette/9Chip.png";
            chipNum = 9;
        } else if (i == 2500000000) {
            document.getElementById('chip2500000000').style.opacity = 100;
            chipURL = "../images/casino/roulette/10Chip.png";
            chipNum = 10;
        } else if (i == 10000000000) {
            document.getElementById('chip10000000000').style.opacity = 100;
            chipURL = "../images/casino/roulette/11Chip.png";
            chipNum = 11;
        }
    });
}
function clearTable() {
    if (parseInt($('#totalStakeVal').html()) > 0) {
        $('.chipColour').val('0');
        $('.tableChip').attr("src", '../images/casino/roulette/0Chip.png');
        $('.stakeSpan').fadeOut(250, function () {
            window.setTimeout(function () {
                $('#totalStake').html('$0');
                $('#totalStakeVal').html('0');
            }, 250);
            window.setTimeout(function () {
                $('.dollarCount').html('$0');
                $('.realCount').val('0');
            }, 250);
        });
        var ua = navigator.userAgent.toLowerCase();
        var isAndroid = ua.indexOf("mobile") > -1;
        if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/) == false && isAndroid == false) {
            selectChipsAudio = document.createElement('audio');
            selectChipsAudio.setAttribute('src', 'sounds/selectChip.wav');
            $.get();
            selectChipsAudio.addEventListener("load", function () {
                selectChipsAudio.play();
            }, true);
            selectChipsAudio.play();
        }
    }
}
var casino1 = 0, casino2 = 0;
function submitCrewFeed() {
    var msg = document.getElementById("feed_msg").value;
    var username = document.getElementById("feed_name").value;
    var crew = document.getElementById("feed_crew").value;
    document.getElementById("feed_msg").value = '';
    $.post("crewfeed.php",
        {
            message: msg,
            username: username,
            crew: crew
        }).done(function (data) {
        $('#crewFeedChat').prepend(data);
    });
}
var hasNewMail = false;
var noOfLoops = 0;
var docTitle = 'Infamous Gangsters';
function crewfeed() {
    $.ajax({
        url: "crewfeed.php?check=true"
    }).done(function( datas ) {
        var data=JSON.parse(datas);
        if(!data['vacio'])
            newCrewFeedMsg();
        if(data['texto']==''){
            $('#crewFeedChat').html("<div class=\"crewFeedEmpty\">Feed Empty.</div>");
        }else{
            $('#crewFeedChat').html(data['texto']);
        }
    });
}
// setTimeout(function () {
//     setInterval(crewfeed, 7000);
// }, 2500);
function updateCasinoInfo(i, action, casinoID) {
    $('#casinoLoader' + i).fadeIn(150, function () {
        if (action == 1) {
            $.post("includes/casinoupdates.php", {casinoID: casinoID, action: 1}).done(function () {
                liveUpdates();
                document.getElementById('alertBox').innerHTML = 'Profit Reset!';
                $('#casinoLoader' + i).delay(150).fadeOut(250);
                $('#alertBox').fadeIn(250, function () {
                    $('#alertBox').delay(2300).fadeOut(300);
                });
                $('#casino' + i).fadeOut(250);
            });
        } else if (action == 2) {
            $.post("includes/casinoupdates.php", {
                casinoID: casinoID,
                action: 2,
                maxBet: document.getElementById('newMax' + i).value
            }).done(function (data) {
                if (data == "-1") {
                    document.getElementById('alertBox').innerHTML = '<font color=red>Error:</font> Maximum Bet entered is too low.';
                    $('#casinoLoader' + i).delay(150).fadeOut(250);
                    $('#alertBox').fadeIn(250, function () {
                        $('#alertBox').delay(2000).fadeOut(300);
                    });
                    document.getElementById('newMax' + i).select();
                } else {
                    document.getElementById('alertBox').innerHTML = 'Maximum Bet Updated <font color="#bbbbbb">(</font><font color="#FFC753">' + data + '</font><font color="#bbbbbb">)</font>!';
                    $('#casinoLoader' + i).delay(150).fadeOut(250);
                    $('#alertBox').fadeIn(250, function () {
                        $('#alertBox').delay(2300).fadeOut(300);
                    });
                    $('#casino' + i).fadeOut(250, function () {
                        document.getElementById('newMax' + i).value = '';
                    });
                }
            });
        } else if (action == 3) {
            $.post("includes/casinoupdates.php", {
                casinoID: casinoID,
                action: 3,
                newOwner: document.getElementById('newOwner' + i).value
            }).done(function (data) {
                if (data == "-1") {
                    document.getElementById('alertBox').innerHTML = '<font color=red>Error:</font> User does not exist.';
                    $('#casinoLoader' + i).delay(150).fadeOut(250);
                    $('#alertBox').fadeIn(250, function () {
                        $('#alertBox').delay(2000).fadeOut(300);
                    });
                    document.getElementById('newOwner' + i).select();
                } else if (data == "-2") {
                    document.getElementById('alertBox').innerHTML = '<font color=red>Error:</font> You cannot send to yourself.';
                    $('#casinoLoader' + i).delay(150).fadeOut(250);
                    $('#alertBox').fadeIn(250, function () {
                        $('#alertBox').delay(2000).fadeOut(300);
                    });
                    document.getElementById('newOwner' + i).select();
                } else {
                    document.getElementById('alertBox').innerHTML = 'You sent the Casino to: <a href="viewprofile.php?username=' + data + '" style="font-size: 11px;">' + data + '</a>.';
                    $('#casinoLoader' + i).delay(150).fadeOut(250);
                    $('#alertBox').fadeIn(250, function () {
                        $('#alertBox').delay(2300).fadeOut(300);
                    });
                    $('#casino' + i).fadeOut(250, function () {
                        document.getElementById('newOwner' + i).value = '';
                    });
                    $('#casinoBox' + i).fadeOut(250);
                }
            });
        } else if (action == 4) {
            $.post("includes/casinoupdates.php", {
                casinoID: casinoID,
                action: 4,
                newPrice: document.getElementById('newPrice' + i).value
            }).done(function (data) {
                if (data == "-1") {
                    document.getElementById('alertBox').innerHTML = '<font color=red>Error:</font> You don\'t own the casino.';
                    $('#casinoLoader' + i).delay(150).fadeOut(250);
                    $('#alertBox').fadeIn(250, function () {
                        $('#alertBox').delay(2000).fadeOut(300);
                    });
                    document.getElementById('newPrice' + i).select();
                } else {
                    var propVal = parseInt(document.getElementById('newPrice' + i).value);
                    var addedLabel = propVal == 0 ? "Removed from" : "Added to";
                    document.getElementById('alertBox').innerHTML = 'Property ' + addedLabel + ' Quicktrade!';
                    $('#casinoLoader' + i).delay(150).fadeOut(250);
                    $('#alertBox').fadeIn(250, function () {
                        $('#alertBox').delay(2300).fadeOut(300);
                    });
                    $('#casino' + i).fadeOut(250, function () {
                        document.getElementById('newPrice' + i).value = '';
                    });
                }
            });
        } else if (action == 8) {
            $.post("includes/casinoupdates.php", {
                casinoID: casinoID,
                action: 8,
                maxBet: document.getElementById('newMax' + i).value
            }).done(function (data) {
                if (data == "-1") {
                    document.getElementById('alertBox').innerHTML = '<font color=red>Error:</font> Bullet Price entered is too High.';
                    $('#casinoLoader' + i).delay(150).fadeOut(250);
                    $('#alertBox').fadeIn(250, function () {
                        $('#alertBox').delay(2300).fadeOut(300);
                    });
                    document.getElementById('newMax' + i).select();
                } else {
                    document.getElementById('alertBox').innerHTML = 'Bullet Price Updated <font color="#bbbbbb">(</font><font color="#FFC753">' + data + '</font><font color="#bbbbbb">)</font>.';
                    $('#casinoLoader' + i).delay(150).fadeOut(250);
                    $('#alertBox').fadeIn(250, function () {
                        $('#alertBox').delay(2000).fadeOut(300);
                    });
                    $('#casino' + i).fadeOut(250, function () {
                        document.getElementById('newMax' + i).value = '';
                    });
                }
            });
        }
    });
}
function clearFeed() {
    $.get("crewfeed.php?delete=true").done(function (data) {
        crewfeed();
    });
}
$(document).on("click", ".js-delete-ac", deleteAc);
function deleteAc() {
    var tr = $(this).closest(".js-activity-div");
    var acID = $(this).attr("data-id");
    var acTable = $(this).attr("data-table");
    $.post("delete.php", {action: acTable, activityID: acID}).done(function () {
        tr.remove();
    });
    return false;
}
function switchProfileView(div) {
    if ("pass" == div) {
        $('#passwordDiv').fadeToggle(0, function () {
            $('.profileDiv').not('#passwordDiv').fadeOut(0);
        });
    } else if ("friendsList" == div) {
        $('#friendsListDiv').fadeToggle(0, function () {
            $('.profileDiv').not('#friendsListDiv').fadeOut(0);
        });
    } else if ("notepad" == div) {
        $('#notepadDiv').fadeToggle(0, function () {
            $('.profileDiv').not('#notepadDiv').fadeOut(0);
        });
    }
}
function removeFriend(id) {
    $.post("includes/delete.php", {action: 2, friendID: id}).done(function (data) {
        document.getElementById('myFriendsDiv').innerHTML = data;
    });
}

function addFriend(user) {
    if (user.length > 0) {
        $.post("includes/add.php", {action: 1, username: user}).done(function (data) {
            if (data == "-1") {
                alert('Invalid username entered.');
                document.getElementById('newFriend').select();
            } else if (data == "-2") {
                alert('You have already added this person.');
                document.getElementById('newFriend').select();
            } else {
                document.getElementById('myFriendsDiv').innerHTML = data;
                document.getElementById('newFriend').value = '';
            }
        });
    }
}
function deleteMessage(msgID) {
    $.post("includes/delete.php", {action: 3, messageID: msgID}).done(function (data) {
        $('#message' + msgID).animate({height: 'hide', opacity: 'hide'}, 175);
    });
}
function deleteAllMessages() {
    $.post("includes/delete.php", {action: 4}).done(function (data) {
        $(".messageDiv").animate({height: 'hide', opacity: 'hide'}, 175);
    });
}
function topicEditorToggle() {
    $('#topicEditor').toggle();
    return false;
}
function likePost(commentIDVal) {
    document.getElementById('likes_span_val_' + commentIDVal).style.opacity = 0.5;
    $.post("includes/like.php", {commentID: commentIDVal}).done(function (data) {
        if (parseInt(data) == 0) {
            document.getElementById('likes_span_' + commentIDVal).style.display = 'none';
        } else {
            document.getElementById('likes_span_' + commentIDVal).style.display = 'inline-block';
            document.getElementById('likes_span_val_' + commentIDVal).innerHTML = '+' + parseInt(data);
        }
        document.getElementById('likes_span_val_' + commentIDVal).style.opacity = 1;
    });
}
function checkForNewComments(topicIDVal, timePassedVal) {
    $.post("includes/newcomments.php", {topicID: topicIDVal, time: timePassedVal}).done(function (data) {
        if (parseInt(data) > 0) {
            $('.newCommentsLoader').fadeIn(150).css('display', 'block');
            document.getElementById('newCommentsVal').innerHTML = parseInt(data);
        }
    });
}
function replyToPost(user) {
    $('#replyForm').show();
    $('#replyingToCommentUsername').attr('value', user);
    $('#newpost').focus();
}
function cancelReply() {
    $('#replyForm').hide();
}
var timers = document.getElementsByClassName('crimeTimer');
function crimeCountdown(removeOnAvailable) {
    var removeDiv = false;
    if (removeOnAvailable !== undefined) {
        removeDiv = removeOnAvailable;
    }
    for (var i = 0; i < timers.length; i++) {
        var timer = timers[i];
        var label;
        var seconds = parseInt(timer.getAttribute('data-counter'));
        if (seconds == -1) {
            label = "<span style='color: #555555;'>Not Available</span>";
        }
        else if (seconds < 1) {
            if (removeDiv == true) {
                label = "<span style='color: #bbbbbb;'>0 seconds</span>";
            }
            else {
                label = "<span style='color: gold;'>Available</span>";
            }
        }
        else if (seconds < 10) {
            label = "<span style='color: #bbbbbb;'>" + seconds.toLocaleString('en') + " seconds</span>";
        }
        else {
            label = "<span style='color: #999999;'>" + seconds.toLocaleString('en') + " seconds</span>";
        }
        if (label.length > 0 && timer.getAttribute('data-counter') >= 0) {
            timer.innerHTML = label;
            timer.setAttribute('data-counter', seconds - 1);
        }
    }
    setTimeout(function () {
        crimeCountdown(removeDiv);
    }, 1000);
}

function dayMinHrCountdown() {
}
function dayMinHrCountdown() {
    var counters = $(".js-hrminsec-countdown");
    for (var i = 0; i < counters.length; i++) {
        var counter = $(counters[i]);
        var timeLeft = parseInt($(counter).attr("data-time-left"));
        if (timeLeft <= 0) {
            var availableText = $(counter).attr("data-available-text") != undefined ? $(counter).attr("data-available-text") : "Available!";
            $(counter).html(availableText);
            continue;
        }
        var hrs = Math.floor(timeLeft / 3600);
        var mins = Math.floor((Math.floor(timeLeft % 3600)) / 60);
        var secs = Math.floor((Math.floor(timeLeft % 60)) % 60);
        if (secs <= 9) secs = '0' + secs;
        if (mins <= 9) mins = '0' + mins;
        if (hrs <= 9) hrs = '0' + hrs;
        $(counter).html(hrs + ':' + mins + ':' + secs);
        timeLeft--;
        $(counter).attr("data-time-left", timeLeft);
        if (timeLeft <= 0) $(".js-show-on-complete").slideDown(250);
    }
    setTimeout(dayMinHrCountdown, 1000);
}
$(document).on("ready", dayMinHrCountdown);

function checkToggle() {
    var toToggleClass = $(this).attr("data-class-to-check");
    var numOfClass = $("." + toToggleClass).length;
    var numChecked = $("." + toToggleClass).is(":checked");
    if (numChecked == true) {
        if ($("#amount_selected").length == 1) {
            $("#amount_selected").html("0");
        }
        $("." + toToggleClass).prop("checked", false);
    } else {
        if ($("#amount_selected").length == 1) {
            $("#amount_selected").html(numOfClass);
        }
        $("." + toToggleClass).prop("checked", true);
    }
    return false;
}
$(document).on("click",".js-check-toggle",checkToggle);