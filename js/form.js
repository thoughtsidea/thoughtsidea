
function sendTelegramMessage() {
  const telegramAPI = 'https://api.telegram.org/bot6123810495:AAFRm6x3dgr63kPveAii-3sE4-Gvu4fkPd0/sendMessage';

  const chatID = '-1001968463839';

  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const phone = document.getElementById('phone').value;
  const proTitle = document.getElementById('proTitle').value;
  const proDesc = document.getElementById('proDesc').value;
  const dept = document.getElementById('dept').value;

  // Message to be sent to Telegram
  const telegramMessage = `New Project Enquiry:\nName: ${name}\nEmail: ${email}\nDepartment: ${dept}\nProject Title: ${proTitle}\nProject Description: ${proDesc}`;

  // Send the message to Telegram using Fetch API
  fetch(telegramAPI, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      chat_id: chatID,
      text: telegramMessage,
    }),
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      alert('Form submission successful! Thank you.');
    })
    .catch(error => {
      alert('Form submission failed. Please try again later.');
      console.error('Error:', error);
    });
}