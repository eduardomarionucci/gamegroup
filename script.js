function sendDiscussion() {
        
    var receiveThird = document.getElementById("receiveThird").value;
    if (requestPage === "mainPanel" || requestPage === "userPanel") {
        receiveSecond = document.getElementById("receiveSecond").value;
    }

    $.post("php/insertDiscussion.php", {
        requestPage: requestPage,
        receiveSecond: receiveSecond, //discussion or discussion
        receiveThird: receiveThird, //game or comment
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