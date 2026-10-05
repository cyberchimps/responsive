export const displayToast = (msg, status) => {
  let background = status === "error" ? "#FF5151" : "#00CF21";
  Toastify({
    text: msg,
    duration: 3000,
    gravity: "top",
    position: "center",
    stopOnFocus: true,
    offset: {
      x: 0,
      y: 30,
    },
    style: {
      background,
    },
  }).showToast();
};

export const convertTruthyFalsyValue = (value) => {
  switch (value) {
    case "0":
    case 0:
    case false:
    case "false":
    case null:
    case undefined:
    case "":
      return false;
    case "1":
    case 1:
    case true:
    case "true":
      return true;
  }
};