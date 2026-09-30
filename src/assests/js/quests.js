let currentDate = new Date(); // Live Date
let selectedDateStr = formatDateToYMD(currentDate);

document.addEventListener("DOMContentLoaded", () => {
    renderCalendar(currentDate);
    fetchQuestsForDate(selectedDateStr);

    // Month Navigation Listeners
    document.getElementById('prev-month').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    document.getElementById('next-month').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    // Add Quest Plus Button Click Handler
    document.getElementById('add-quest-btn').addEventListener('click', () => {
        alert('Add Quest trigger for date: ' + selectedDateStr);
    });
});

function formatDateToYMD(dateObj) {
    const yyyy = dateObj.getFullYear();
    const mm = String(dateObj.getMonth() + 1).padStart(2, '0');
    const dd = String(dateObj.getDate()).padStart(2, '0');
    return `${yyyy}-${mm}-${dd}`;
}

function renderCalendar(dateObj) {
    const year = dateObj.getFullYear();
    const month = dateObj.getMonth();

    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    
    // Header date display matching screenshot layout format: "01 Sep, 26 Tuesday"
    const dayFormatted = String(dateObj.getDate()).padStart(2, '0');
    const shortYear = String(year).slice(-2);
    document.getElementById('calendar-header-title').textContent = 
        `${dayFormatted} ${monthNames[month]}, ${shortYear} ${dayNames[dateObj.getDay()]}`;

    const gridContainer = document.getElementById('calendar-grid');
    gridContainer.innerHTML = '';

    // Day headers (Sun - Sat)
    const shortDays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    shortDays.forEach(day => {
        const dayHeader = document.createElement('div');
        dayHeader.className = 'day-header';
        dayHeader.textContent = day;
        gridContainer.appendChild(dayHeader);
    });

    // Calculate grid layout days
    const firstDayIndex = new Date(year, month, 1).getDay();
    const totalDays = new Date(year, month + 1, 0).getDate();

    // Render preceding empty offset slots
    for (let i = 0; i < firstDayIndex; i++) {
        const emptyCell = document.createElement('div');
        emptyCell.className = 'day-number empty';
        gridContainer.appendChild(emptyCell);
    }

    // Render calendar days
    for (let day = 1; day <= totalDays; day++) {
        const dayCell = document.createElement('div');
        dayCell.className = 'day-number';
        dayCell.textContent = day;

        const thisDateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        
        if (thisDateStr === selectedDateStr) {
            dayCell.classList.add('active');
        }

        dayCell.addEventListener('click', () => {
            selectedDateStr = thisDateStr;
            currentDate = new Date(year, month, day);
            renderCalendar(currentDate);
            fetchQuestsForDate(selectedDateStr);
        });

        gridContainer.appendChild(dayCell);
    }
}

async function fetchQuestsForDate(dateStr) {
    const container = document.getElementById('quest-list-container');
    container.innerHTML = '<p class="no-quests-msg">Loading quests...</p>';

    try {
        const response = await fetch(`../api/quests.php?date=${dateStr}`);
        const result = await response.json();

        if (result.success && result.quests.length > 0) {
            container.innerHTML = '';
            result.quests.forEach(quest => {
                const questEl = document.createElement('div');
                questEl.className = 'quest-item';

                const typeIcon = quest.type_icon ? quest.type_icon : 'fa-solid fa-shield-halved';

                questEl.innerHTML = `
                    <div class="quest-type">
                        <span>${quest.type_label}</span>
                        <i class="${typeIcon}"></i>
                    </div>
                    <div class="quest-title-text">${quest.title}</div>
                    <div class="quest-meta">${quest.start_time} - ${quest.end_time} • +${quest.xp_reward} XP</div>
                `;
                container.appendChild(questEl);
            });
        } else {
            container.innerHTML = '<p class="no-quests-msg">No quests scheduled for this date.</p>';
        }
    } catch (err) {
        console.error("Failed to fetch quests:", err);
        container.innerHTML = '<p class="no-quests-msg">Error loading quests from server.</p>';
    }
}