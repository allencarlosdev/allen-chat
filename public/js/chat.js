const msgerForm = get(".msger-input-area");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");
const PERSON_IMG = "/img/profile_user.svg";
const chatWith = get(".chat-with");
const typing = get(".typing");
const chatStatus = get(".chat-status");
const chatId = window.location.pathname.substr(6);
let authUser;

window.onload = function () {
    axios
        .get("/auth/user")
        .then((res) => {
            authUser = res.data.authUser;
        })
        .then(() => {
            axios
                .get(`/chat/${chatId}/get_users`)
                .then((res) => {
                    let results = res.data.users.filter(
                        (user) => user.id != authUser.id
                    );

                    if (results.length > 0)
                        chatWith.innerHTML = results[0].name;
                });
        })
        .then(() => {
            axios.get(`/chat/${chatId}/get_messages`).then((res) => {
                appendMessages(res.data.messages);
            });
        })
};

msgerForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const msgText = msgerInput.value;
    if (!msgText) return;

    axios
        .post("/message/sent", {
            message: msgText,
            chat_id: 1, // pendant
        })
        .then((res) => {
            let data = res.data;
            appendMessage(
                data.user.name,
                PERSON_IMG,
                "right",
                data.content,
                formatDate(new Date(data.created_at))
            );
        })
        .catch((error) => {
            console.log("An error has occurred");
            console.log(error);
        });

    msgerInput.value = "";
});

function appendMessages(messages) {
    let side = "left";
    messages.forEach((message) => {
        side = (message.user_id == authUser.id) ? "right" : "left";

        appendMessage(
            message.user.name,
            PERSON_IMG,
            side,
            message.content,
            formatDate(new Date(message.created_at))
        );
    });
}

function appendMessage(name, img, side, text, date) {
    //   Simple solution for small apps
    const msgHTML = `
  <div class="msg ${side}-msg">
    <div class="msg-img" style="background-image: url(${img})"></div>

    <div class="msg-bubble">
      <div class="msg-info">
        <div class="msg-info-name">${name}</div>
        <div class="msg-info-time">${date}</div>
      </div>

      <div class="msg-text">${text}</div>
    </div>
  </div>
`;

    msgerChat.insertAdjacentHTML("beforeend", msgHTML);
    scrollToBottom();
}

// Echo
Echo.join(`chat.${chatId}`).listen("MessageSent", (e) => {
    console.log(e);
});
// Utils
function get(selector, root = document) {
    return root.querySelector(selector);
}

function formatDate(date) {
    const d = date.getDate();
    const mo = date.getMonth() + 1;
    const y = date.getFullYear();
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();

    return `${d}/${mo}/${y} ${h.slice(-2)}:${m.slice(-2)}`;
}

function scrollToBottom() {
    msgerChat.scrollToBottom = msgerChat.scrollHeight;
}
