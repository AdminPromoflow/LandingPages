class PreviewMaterial {
  constructor() {

  }
  showSelectedPreviewtMaterial(data){
    previewMaterialContainer.innerHTML = "";

    previewMaterialContainer.innerHTML +=
    '<h3>'+data['material']+'</h3>' +

    '<div class="img-preview-material">' +
      '<img src="../../'+data['link']+'" alt="">' +
    '</div>' +
    '<div class="description-preview-material">' +
      '<p>'+data['description']+'</p>' +
    '</div>'
    ;
  }




}
const previewMaterialContainer = document.getElementById("preview-material");
const  previewMaterial = new PreviewMaterial();
