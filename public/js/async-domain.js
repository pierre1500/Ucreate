function initSubmitButtons() {
    const submitsButtons = document.querySelectorAll('[data-project-id]');
    if (submitsButtons) {
        for (const submitsButton of submitsButtons) {
            submitsButton.addEventListener('click', () => {
                const projectId = submitsButton.getAttribute('data-project-id');
                const linkedInput = document.querySelector(`[data-input-domain="${projectId}"]`);
                if (linkedInput) {
                    const inputValue = linkedInput.value;
                    const data = {
                        domain: inputValue,
                        projectId: projectId
                    };
                    fetch('/project/ajax/domain', { method: 'POST', body: JSON.stringify(data) })
                    .then(response => response.json())
                    .then(data => {
                        let message = 'Something went wrong...!';
                        if (data.success) {
                            message = 'All good muh frend...!';
                        }
                        alert(message);
                    });
                }
            });
        }
    }
}

window.addEventListener('load', () => {
    initSubmitButtons();
});