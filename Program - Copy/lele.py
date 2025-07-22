import customtkinter as ctk
import tkinter.messagebox as messagebox
import tkinter.simpledialog as simpledialog
import requests

ctk.set_appearance_mode("dark")
ctk.set_default_color_theme("dark-blue")  # Bisa diganti sesuai selera

class AbsensiLauncher(ctk.CTk):
    def __init__(self):
        super().__init__()

        self.uid_pc = "A37FA80F"  # Ganti sesuai UID PC ini

        self.checked_in = False
        self.nama_user = ""

        self.title("SISTEM ABSENSI")
        self.geometry(f"{self.winfo_screenwidth()}x{self.winfo_screenheight()}")
        self.attributes("-fullscreen", True)
        self.attributes("-topmost", True)
        self.protocol("WM_DELETE_WINDOW", self.disable_close)
        self.resizable(False, False)

        self.create_widgets()
        self.update_ui()
        self.keep_focus()

    def create_widgets(self):
        # Main card
        self.main_frame = ctk.CTkFrame(self, corner_radius=12, width=640, height=460)
        self.main_frame.place(relx=0.5, rely=0.5, anchor="center")

        # Judul
        self.header = ctk.CTkLabel(
            self.main_frame,
            text="SISTEM ABSENSI RFID",
            font=ctk.CTkFont(size=28, weight="bold"),
            text_color="#00BFFF"
        )
        self.header.pack(pady=(30, 20))

        # Status
        self.status_label = ctk.CTkLabel(self.main_frame, text="", font=ctk.CTkFont(size=20, weight="bold"))
        self.status_label.pack(pady=(0, 10))

        # Nama / welcome
        self.welcome_label = ctk.CTkLabel(self.main_frame, text="", font=ctk.CTkFont(size=16))
        self.welcome_label.pack(pady=(0, 30))

        # Button area
        self.buttons_frame = ctk.CTkFrame(self.main_frame, fg_color="transparent")
        self.buttons_frame.pack()

        # Tombol simulasi tap (ganti tombol tap kartu & login manual)
        self.btn_simulasi_tap = ctk.CTkButton(
            self.buttons_frame,
            text="🕹️ Simulasi Tap",
            width=260,
            height=50,
            corner_radius=12,
            command=self.simulasi_tap
        )

        self.btn_logout = ctk.CTkButton(
            self.buttons_frame,
            text="🔓 Logout / Check-out",
            width=260,
            height=50,
            corner_radius=12,
            fg_color="#2ecc71",
            hover_color="#27ae60",
            command=self.logout
        )

        self.btn_exit = ctk.CTkButton(
            self.buttons_frame,
            text="🔒 Keluar (Admin)",
            width=180,
            height=45,
            corner_radius=12,
            fg_color="#e74c3c",
            hover_color="#c0392b",
            command=self.keluar
        )

    def update_ui(self):
        # Reset semua tombol dulu
        for widget in self.buttons_frame.winfo_children():
            widget.grid_forget()

        if self.checked_in:
            self.status_label.configure(text="✅ Anda sudah CHECK-IN", text_color="#2ecc71")
            self.welcome_label.configure(text=f"Halo, {self.nama_user}", text_color="white")
            self.btn_logout.grid(row=0, column=0, padx=10, pady=10)
            self.btn_exit.grid(row=1, column=0, padx=10, pady=5)

            self.attributes("-fullscreen", False)
            self.attributes("-topmost", False)
            self.center_window(640, 460)
        else:
            self.status_label.configure(text="❌ Anda BELUM CHECK-IN", text_color="#e74c3c")
            self.welcome_label.configure(text="Silakan tap kartu RFID terlebih dahulu.", text_color="white")
            self.btn_simulasi_tap.grid(row=0, column=0, padx=10, pady=10)
            self.btn_exit.grid(row=1, column=0, padx=10, pady=5)

            self.attributes("-fullscreen", True)
            self.attributes("-topmost", True)

        self.update()

    def simulasi_tap(self):
        if not self.checked_in:
            self.checked_in = True
            self.nama_user = "User Simulasi"
            messagebox.showinfo("Simulasi", "Simulasi tap berhasil, check-in!")
            self.update_ui()
        else:
            messagebox.showinfo("Info", "Sudah check-in.")

    def logout(self):
        confirm = messagebox.askyesno("Konfirmasi", "Yakin ingin logout?")
        if confirm:
            self.checked_in = False
            self.nama_user = ""
            messagebox.showinfo("Logout", "Anda telah logout.")
            self.update_ui()

    def keluar(self):
        self.lift()
        self.attributes("-topmost", True)
        password = simpledialog.askstring("Admin Exit", "Masukkan password admin:", show="*", parent=self)
        if password == "admin123":
            self.destroy()
        else:
            messagebox.showerror("Salah", "Password salah.")

    def disable_close(self):
        pass  # Disable tombol close window

    def keep_focus(self):
        # Gabungkan pengecekan tap kartu otomatis dan fokus window
        if not self.checked_in:
            if cek_status_uid(self.uid_pc):
                self.checked_in = True
                self.nama_user = "FADYEL"
                self.update_ui()
                return
            self.lift()
            self.focus_force()
            self.after(3000, self.keep_focus)  # Cek lagi tiap 3 detik

    def center_window(self, width, height):
        screen_width = self.winfo_screenwidth()
        screen_height = self.winfo_screenheight()
        x = (screen_width - width) // 2
        y = (screen_height - height) // 2
        self.geometry(f"{width}x{height}+{x}+{y}")

def cek_status_uid(uid):
    url = "https://script.google.com/macros/s/AKfycbwXaT04hah9wd3nshGR6W4NwHb57ODv8rXbJgbVnY6FuQ6E0SWNOMcvNh2Oju6LimN0/exec"
    try:
        r = requests.post(url, data={"uid": uid}, timeout=5)
        data = r.json()
        if data["status"] == "success":
            if data["keterangan"] in ["Hadir", "Telat"]:
                return True
    except Exception as e:
        print("Gagal cek UID:", e)
    return False

if __name__ == "__main__":
    app = AbsensiLauncher()
    app.mainloop()
