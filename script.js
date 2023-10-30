function sendDiscussion() {
        
    var receiveThird = document.getElementById("receiveThird").value;
    if (requestPage === "mainPanel" || requestPage === "userPanel") {
        receiveSecond = document.getElementById("receiveSecond").value;
    }
    var receiveFourth = document.getElementById("receiveFourth").value;

    $.post("php/insertDiscussion.php", {
        requestPage: requestPage,
        receiveSecond: receiveSecond, //discussion or discussion
        receiveThird: receiveThird, //game or comment
        receiveFourth: receiveFourth //image link
    }, function(x) {
        $("#" + requestPage).html(x);
    });
}

function sendRelevance(id, operation, requestRequired) {

    $.post("./php/queryRelevance.php", {
        requestPage: requestPage,
        requestId: id,
        requestOperation: operation,
        requestRequired: requestRequired //comment_id or discussion_id
    }, function(x) {
        $("#" + requestPage).html(x);
    });
}

function sendDelete(id, requestRequired) {

    $.post("./php/queryDelete.php", {
        requestPage: requestPage,
        requestId: id,
        requestRequired: requestRequired //comment or discussion
    }, function(x) {
        $("#" + requestPage).html(x);
    });

    if (requestPage == "discussionPanel" && requestRequired == "discussion") {
        window.history.back();
    }
}

let showed = false; 

function showLinkInput() {
    console.log("showLinkInput");
    if (!showed) {
        document.getElementById("linkInput").style.display = "flex";
        showed = true;
    } else {
        document.getElementById("linkInput").style.display = "none";
        showed = false;
    }
}