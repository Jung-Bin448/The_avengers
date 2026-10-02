# 🎮 Level Up Life

## 📖 User Guide

Follow the steps below to set up and run the **Level Up Life** web application.

### 1️⃣ Clone the Repository

Open **VS Code** or a normal terminal and navigate to the directory where you want to store the project.

Run the following command:

```bash
git clone https://github.com/Jung-Bin448/The_avengers.git
```

### 2️⃣ Open the Project

After cloning the repository, move into the project directory:

```bash
cd The_avengers
```

You can then open the project in **VS Code** using:

```bash
code .
```

### 3️⃣ Start Docker

Make sure **Docker Desktop** is installed and running on your computer.

Open the **VS Code terminal** inside the project directory and run:

```bash
docker compose up
```

> **Note:** The first time you run this command, Docker may take some time to download the required images and set up the application environment.

### 4️⃣ Open the Application

Once Docker has finished starting the containers, open any web browser and go to:

**http://localhost:8000**

The **Level Up Life** web application should now be available.

### 5️⃣ Create an Account

If you are using the application for the first time:

1. Open the **Sign Up** page.
2. Enter the required details.
3. Create your new account.
4. Log in using your account details.
5. You will then be taken to the **Dashboard**.

### 🛑 Stopping the Application

To stop the application, return to the terminal and press:

```text
Ctrl + C
```

You can also stop the Docker containers by running:

```bash
docker compose down
```

### ▶️ Starting the Application Again

When you want to use the application again, open the project directory and run:

```bash
docker compose up
```

Then open:

**http://localhost:8000**

---

## 💻 Requirements

Before running the application, make sure you have:

* **Docker Desktop** installed
* **Git** installed
* **VS Code** (recommended)
* A modern **web browser**

---

## 🚀 Enjoy Level Up Life!

Create your account, complete tasks, earn **XP**, level up, and progress through the ranks! 🎮✨
