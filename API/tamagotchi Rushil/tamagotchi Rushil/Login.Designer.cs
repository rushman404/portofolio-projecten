namespace tamagotchi_Rushil
{
    partial class Login
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            loginBtn = new Button();
            usernameTxt = new TextBox();
            passwordTxt = new TextBox();
            label3 = new Label();
            registreerBtn = new Button();
            SuspendLayout();
            // 
            // loginBtn
            // 
            loginBtn.BackColor = Color.FromArgb(212, 115, 26);
            loginBtn.FlatAppearance.BorderSize = 0;
            loginBtn.FlatStyle = FlatStyle.Flat;
            loginBtn.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            loginBtn.ForeColor = Color.White;
            loginBtn.Location = new Point(47, 302);
            loginBtn.Name = "loginBtn";
            loginBtn.Size = new Size(270, 46);
            loginBtn.TabIndex = 0;
            loginBtn.Text = "Ga naar abu";
            loginBtn.UseVisualStyleBackColor = false;
            loginBtn.Click += loginBtn_Click;
            // 
            // usernameTxt
            // 
            usernameTxt.BorderStyle = BorderStyle.FixedSingle;
            usernameTxt.Font = new Font("Palatino Linotype", 10.8F, FontStyle.Bold);
            usernameTxt.ForeColor = Color.FromArgb(58, 40, 0);
            usernameTxt.Location = new Point(67, 142);
            usernameTxt.Multiline = true;
            usernameTxt.Name = "usernameTxt";
            usernameTxt.PlaceholderText = "Username";
            usernameTxt.Size = new Size(238, 42);
            usernameTxt.TabIndex = 1;
            usernameTxt.WordWrap = false;
            // 
            // passwordTxt
            // 
            passwordTxt.BackColor = SystemColors.Window;
            passwordTxt.BorderStyle = BorderStyle.FixedSingle;
            passwordTxt.Font = new Font("Palatino Linotype", 10.8F, FontStyle.Bold, GraphicsUnit.Point, 0);
            passwordTxt.ForeColor = Color.FromArgb(58, 40, 0);
            passwordTxt.Location = new Point(67, 220);
            passwordTxt.Multiline = true;
            passwordTxt.Name = "passwordTxt";
            passwordTxt.PlaceholderText = "Password";
            passwordTxt.Size = new Size(238, 42);
            passwordTxt.TabIndex = 2;
            passwordTxt.WordWrap = false;
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.BackColor = Color.Transparent;
            label3.Font = new Font("Papyrus", 18F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label3.ForeColor = Color.FromArgb(196, 122, 26);
            label3.Location = new Point(86, 64);
            label3.Name = "label3";
            label3.Size = new Size(209, 48);
            label3.TabIndex = 5;
            label3.Text = "Welkom terug";
            label3.TextAlign = ContentAlignment.MiddleCenter;
            // 
            // registreerBtn
            // 
            registreerBtn.AutoSize = true;
            registreerBtn.BackColor = Color.Transparent;
            registreerBtn.FlatAppearance.BorderSize = 0;
            registreerBtn.FlatAppearance.MouseDownBackColor = Color.Transparent;
            registreerBtn.FlatAppearance.MouseOverBackColor = Color.Transparent;
            registreerBtn.FlatStyle = FlatStyle.Flat;
            registreerBtn.Font = new Font("Palatino Linotype", 10.8F, FontStyle.Bold | FontStyle.Underline, GraphicsUnit.Point, 0);
            registreerBtn.Location = new Point(47, 354);
            registreerBtn.Name = "registreerBtn";
            registreerBtn.Size = new Size(276, 46);
            registreerBtn.TabIndex = 6;
            registreerBtn.Text = "Geen account? Registreer hier";
            registreerBtn.UseVisualStyleBackColor = false;
            registreerBtn.Click += registreerBtn_Click;
            // 
            // Login
            // 
            AutoScaleDimensions = new SizeF(8F, 20F);
            AutoScaleMode = AutoScaleMode.Font;
            BackColor = Color.FromArgb(250, 243, 220);
            ClientSize = new Size(402, 433);
            Controls.Add(registreerBtn);
            Controls.Add(label3);
            Controls.Add(passwordTxt);
            Controls.Add(usernameTxt);
            Controls.Add(loginBtn);
            FormBorderStyle = FormBorderStyle.FixedSingle;
            Name = "Login";
            StartPosition = FormStartPosition.CenterScreen;
            Text = "Login";
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Button loginBtn;
        private TextBox usernameTxt;
        private TextBox passwordTxt;
        private Label label3;
        private Button registreerBtn;
    }
}