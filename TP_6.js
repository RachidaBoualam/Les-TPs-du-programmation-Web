document.getElementById("form-tache").addEventListener("submit", function(e) {
    e.preventDefault(); 
  
    const input = document.getElementById("input-tache");
    const texte = input.value.trim();
  
    if (texte === "") return;
  
    const li = document.createElement("li");
    li.textContent = texte;
  
    const btnFinie = document.createElement("button");
    btnFinie.textContent = "✔";
    btnFinie.addEventListener("click", () => {
      li.classList.toggle("tache-finie");
    });
  
    const btnSupprimer = document.createElement("button");
    btnSupprimer.textContent = "🗑";
    btnSupprimer.addEventListener("click", () => {
      li.remove();
    });
  
    li.appendChild(btnFinie);
    li.appendChild(btnSupprimer);
  
    document.getElementById("liste-taches").appendChild(li);
  
    input.value = "";
  });
  