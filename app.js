// Регистрация пользователя
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('registerUsername').value;
    const password = document.getElementById('registerPassword').value;

    // Проверяем, не зарегистрирован ли пользователь
    if (localStorage.getItem(username)) {
        alert('User already exists');
    } else {
        // Сохраняем пользователя в localStorage
        localStorage.setItem(username, password);
        alert('Registration successful!');
    }
});

// Авторизация пользователя
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('loginUsername').value;
    const password = document.getElementById('loginPassword').value;

    // Проверяем учетные данные
    if (localStorage.getItem(username) === password) {
        alert('Login successful!');
        // Здесь можно перенаправить пользователя на другую страницу
        window.location.href = 'index.html';
    } else {
        alert('Invalid credentials');
    }
});

function showSuccessMessage() {
    document.getElementById('successModal').style.display = 'block';
}

// Функция для закрытия модального окна
function closeModal() {
    document.getElementById('successModal').style.display = 'none';
}

// Закрытие окна при клике вне модального содержимого
window.onclick = function(event) {
    const modal = document.getElementById('successModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
        const messagesContainer = document.getElementById("messages");
        const form = document.getElementById("form");
        const input = document.getElementById("input");

        // Функция для загрузки сообщений
        async function loadMessages() {
            try {
                const response = await fetch("load_messages.php");
                const messages = await response.json();
                messagesContainer.innerHTML = ""; // Очистка списка
                messages.forEach((msg) => {
                    const li = document.createElement("li");
                    li.textContent = msg.text;
                    messagesContainer.appendChild(li);
                });
            } catch (error) {
                console.error("Ошибка при загрузке сообщений:", error);
            }
        }

        // Обновление сообщений каждые 2 секунды
        setInterval(loadMessages, 2000);

        // Отправка нового сообщения
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const message = input.value.trim();
            if (message) {
                try {
                    await fetch("send_message.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ text: message }),
                    });
                    input.value = ""; // Очистка поля ввода
                    loadMessages(); // Обновить список сообщений
                } catch (error) {
                    console.error("Ошибка при отправке сообщения:", error);
                }
            }
        });

        // Первоначальная загрузка
        loadMessages();
        function updateInfo(selectElement, infoDiv) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const description = selectedOption.getAttribute('data-description');
            infoDiv.textContent = description || 'Информация о предмете появится здесь...';
        }
        
        // Установка обработчика события при загрузке страницы
        window.onload = function() {
            const select = document.getElementById('item');
            const infoDiv = document.getElementById('info');
        
            // При изменении выбора в списке обновляем информацию
            select.addEventListener('change', function() {
                updateInfo(select, infoDiv);
            });
        };
        
        
        
    

