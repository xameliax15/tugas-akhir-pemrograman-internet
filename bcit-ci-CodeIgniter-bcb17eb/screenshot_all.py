import os
import time
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys

# Konfigurasi
BASE_URL = "http://localhost:8000/index.php"
ASSET_DIR = "assets"
USER = {"username": "amelia", "password": "123456"}      # Ganti dengan user biasa


if not os.path.exists(ASSET_DIR):
    os.makedirs(ASSET_DIR)

driver = webdriver.Chrome()

def screenshot(name):
    driver.save_screenshot(os.path.join(ASSET_DIR, name + ".png"))

# 1. Login Page
driver.get(f"{BASE_URL}/auth")
time.sleep(1)
screenshot("login")

# 2. Sign Up Page
driver.get(f"{BASE_URL}/auth/signup")
time.sleep(1)
screenshot("signup")

# 3. Dashboard User (login)
driver.get(f"{BASE_URL}/auth")
time.sleep(1)
driver.find_element(By.NAME, "username").send_keys(USER["username"])
driver.find_element(By.NAME, "password").send_keys(USER["password"])
driver.find_element(By.CSS_SELECTOR, "button[type='submit']").click()
time.sleep(2)
screenshot("dashboard_user")

# 4. Halaman Belajar - Screenshot semua tab utama dan harakat
driver.get(f"{BASE_URL}/dashboard/belajar")
time.sleep(1)

# Switch ke tab Materi
driver.find_element(By.ID, "tabMateriBtn").click()
time.sleep(1)
screenshot("belajar_tab_materi")

# Tunggu tombol menu materi muncul
time.sleep(1)
materi_menu_btns = driver.find_elements(By.CSS_SELECTOR, "#materiMenuBar .huruf-menu-btn")
for idx, btn in enumerate(materi_menu_btns):
    try:
        btn.click()
        time.sleep(1)
        screenshot(f"belajar_materi_{idx+1}")
    except Exception as e:
        print(f"Gagal klik tombol materi ke-{idx+1}:", e)

# Kembali ke tab Dasar
try:
    driver.find_element(By.ID, "tabDasarBtn").click()
    time.sleep(1)
    screenshot("belajar_tab_dasar")
except Exception as e:
    print("Tab Dasar tidak ditemukan:", e)

# Klik tab Lanjutan
try:
    driver.find_element(By.ID, "tabLanjutanBtn").click()
    time.sleep(1)
    screenshot("belajar_tab_lanjutan")
except Exception as e:
    print("Tab Lanjutan tidak ditemukan:", e)

# Screenshot semua tombol harakat di tab Dasar
harakat_tabs = ["Dasar", "Fathah", "Kasrah", "Dhammah", "Fathatain", "Kasratain", "Dhammatain"]
for harakat in harakat_tabs:
    try:
        driver.find_element(By.XPATH, f"//button[contains(text(), '{harakat}')]").click()
        time.sleep(1)
        screenshot(f"belajar_harakat_{harakat.lower()}")
    except Exception as e:
        print(f"Tab {harakat} tidak ditemukan:", e)

# 5. Halaman Kuis
driver.get(f"{BASE_URL}/dashboard/quiz")
time.sleep(1)
screenshot("quiz")

# 6. Halaman Pengaturan User
driver.get(f"{BASE_URL}/dashboard/user_settings")
time.sleep(1)
screenshot("user_settings")

driver.quit()
print("Semua screenshot tersimpan di folder assets/")
