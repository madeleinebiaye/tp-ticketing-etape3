console.log("JavaScript connecté !");

// ==========================
// RÉCUPÉRATION DU FORMULAIRE
// ==========================
const form = document.querySelector(".ticket-form");

if (!form) {
    console.error("Formulaire introuvable");
} else {

    // ==========================
    // GESTION DE LA SOUMISSION
    // ==========================
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // empêche le rechargement

        // Récupération des champs
        const titleInput = document.getElementById("title");
        const descriptionInput = document.getElementById("description");
        const typeSelect = document.getElementById("type");

        const title = titleInput.value.trim();
        const description = descriptionInput.value.trim();
        const type = typeSelect.value;

        // RESET des styles (UX propre)
        titleInput.style.border = "";
        descriptionInput.style.border = "";

        // ==========================
        // VALIDATION DES CHAMPS
        // ==========================
        if (title === "" || description === "") {
            alert("❌ Le titre et la description sont obligatoires");

            if (title === "") {
                titleInput.style.border = "2px solid red";
            }

            if (description === "") {
                descriptionInput.style.border = "2px solid red";
            }

            return; // stop le traitement
        }

        // ==========================
        // FILTRE LOGIQUE : TYPE DE TICKET
        // ==========================
        if (type === "Facturable") {
            alert("⚠️ Ce ticket sera facturé au client");
        } else {
            alert("ℹ️ Ce ticket est inclus dans le contrat");
        }

        // Message final de succès
        alert("✅ Ticket créé avec succès !");

        // Log pour vérification (dev)
        console.log({
            title,
            description,
            type
        });
    });
}

// ==========================
// FILTRE DYNAMIQUE (CHANGE)
// ==========================
const typeSelect = document.getElementById("type");
const infoText = document.getElementById("ticket-type-info");

typeSelect.addEventListener("change", function () {

    // Filtre visuel selon le type choisi
    if (typeSelect.value === "Facturable") {
        infoText.textContent = "⚠️ Ce ticket sera facturé au client";
        infoText.style.color = "red";
    } else {
        infoText.textContent = "✅ Ce ticket est inclus dans le contrat";
        infoText.style.color = "green";
    }
});
