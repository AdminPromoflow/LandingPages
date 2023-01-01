class Templates {
  constructor() {

  }
  showSelectedPreviewtTemplate(data){
  //  alert(data);
    previewMaterialContainer.style.display = "none";

    if (data == "two-end") {
      oneSide25mm.style.display = "none";
      twoSide25mm.style.display = "flex";
    }
    else {
      oneSide25mm.style.display = "flex";
      twoSide25mm.style.display = "none";
    }

  }
}
const templates = new Templates();

const oneSide25mm = document.getElementById("one-side-25mm");
const twoSide25mm = document.getElementById("two-side-25mm");
