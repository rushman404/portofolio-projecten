namespace tamagotchi_Rushil
{
    partial class Registeren
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
            firstnameTxt = new TextBox();
            lastnameTxt = new TextBox();
            emailTxt = new TextBox();
            usernameTxt = new TextBox();
            passwordTxt = new TextBox();
            registrerenBtn = new Button();
            label7 = new Label();
            loginBtn = new Button();
            SuspendLayout();
            // 
            // firstnameTxt
            // 
            firstnameTxt.BorderStyle = BorderStyle.FixedSingle;
            firstnameTxt.Font = new Font("Palatino Linotype", 10.8F, FontStyle.Bold);
            firstnameTxt.ForeColor = Color.FromArgb(58, 40, 0);
            firstnameTxt.Location = new Point(83, 71);
            firstnameTxt.Multiline = true;
            firstnameTxt.Name = "firstnameTxt";
            firstnameTxt.PlaceholderText = "Firstname";
            firstnameTxt.Size = new Size(238, 42);
            firstnameTxt.TabIndex = 0;
            firstnameTxt.WordWrap = false;
            // 
            // lastnameTxt
            // 
            lastnameTxt.BorderStyle = BorderStyle.FixedSingle;
            lastnameTxt.Font = new Font("Palatino Linotype", 10.8F, FontStyle.Bold);
            lastnameTxt.ForeColor = Color.FromArgb(58, 40, 0);
            lastnameTxt.Location = new Point(83, 129);
            lastnameTxt.Multiline = true;
            lastnameTxt.Name = "lastnameTxt";
            lastnameTxt.PlaceholderText = "Lastname";
            lastnameTxt.Size = new Size(238, 42);
            lastnameTxt.TabIndex = 1;
            lastnameTxt.WordWrap = false;
            // 
            // emailTxt
            // 
            emailTxt.BorderStyle = BorderStyle.FixedSingle;
            emailTxt.Font = new Font("Palatino Linotype", 10.8F, FontStyle.Bold);
            emailTxt.ForeColor = Color.FromArgb(58, 40, 0);
            emailTxt.Location = new Point(83, 192);
            emailTxt.Multiline = true;
            emailTxt.Name = "emailTxt";
            emailTxt.PlaceholderText = "Email";
            emailTxt.Size = new Size(238, 42);
            emailTxt.TabIndex = 2;
            emailTxt.WordWrap = false;
            // 
            // usernameTxt
            // 
            usernameTxt.BorderStyle = BorderStyle.FixedSingle;
            usernameTxt.Font = new Font("Palatino Linotype", 10.8F, FontStyle.Bold);
            usernameTxt.ForeColor = Color.FromArgb(58, 40, 0);
            usernameTxt.Location = new Point(83, 251);
            usernameTxt.Multiline = true;
            usernameTxt.Name = "usernameTxt";
            usernameTxt.PlaceholderText = "Username";
            usernameTxt.Size = new Size(238, 42);
            usernameTxt.TabIndex = 3;
            usernameTxt.WordWrap = false;
            // 
            // passwordTxt
            // 
            passwordTxt.BorderStyle = BorderStyle.FixedSingle;
            passwordTxt.Font = new Font("Palatino Linotype", 10.8F, FontStyle.Bold);
            passwordTxt.ForeColor = Color.FromArgb(58, 40, 0);
            passwordTxt.Location = new Point(83, 309);
            passwordTxt.Multiline = true;
            passwordTxt.Name = "passwordTxt";
            passwordTxt.PlaceholderText = "Password";
            passwordTxt.Size = new Size(238, 42);
            passwordTxt.TabIndex = 4;
            passwordTxt.WordWrap = false;
            // 
            // registrerenBtn
            // 
            registrerenBtn.BackColor = Color.FromArgb(139, 90, 0);
            registrerenBtn.FlatAppearance.BorderSize = 0;
            registrerenBtn.FlatStyle = FlatStyle.Flat;
            registrerenBtn.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            registrerenBtn.ForeColor = Color.White;
            registrerenBtn.Location = new Point(65, 371);
            registrerenBtn.Name = "registrerenBtn";
            registrerenBtn.Size = new Size(270, 46);
            registrerenBtn.TabIndex = 0;
            registrerenBtn.Text = "Maak account aan";
            registrerenBtn.UseVisualStyleBackColor = false;
            registrerenBtn.Click += registrerenBtn_Click;
            // 
            // label7
            // 
            label7.AutoSize = true;
            label7.BackColor = Color.Transparent;
            label7.Font = new Font("Papyrus", 18F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label7.ForeColor = Color.FromArgb(196, 122, 26);
            label7.Location = new Point(83, 9);
            label7.Name = "label7";
            label7.Size = new Size(235, 48);
            label7.TabIndex = 12;
            label7.Text = "Nieuw avontuur";
            label7.TextAlign = ContentAlignment.MiddleCenter;
            // 
            // loginBtn
            // 
            loginBtn.AutoSize = true;
            loginBtn.BackColor = Color.Transparent;
            loginBtn.FlatAppearance.BorderSize = 0;
            loginBtn.FlatAppearance.MouseDownBackColor = Color.Transparent;
            loginBtn.FlatAppearance.MouseOverBackColor = Color.Transparent;
            loginBtn.FlatStyle = FlatStyle.Flat;
            loginBtn.Font = new Font("Palatino Linotype", 10.8F, FontStyle.Bold | FontStyle.Underline, GraphicsUnit.Point, 0);
            loginBtn.ForeColor = Color.FromArgb(139, 90, 0);
            loginBtn.Location = new Point(65, 423);
            loginBtn.Name = "loginBtn";
            loginBtn.Size = new Size(276, 46);
            loginBtn.TabIndex = 13;
            loginBtn.Text = "Al een account? Login hier";
            loginBtn.UseVisualStyleBackColor = false;
            loginBtn.Click += loginBtn_Click;
            // 
            // Registeren
            // 
            AutoScaleDimensions = new SizeF(8F, 20F);
            AutoScaleMode = AutoScaleMode.Font;
            BackColor = Color.FromArgb(245, 237, 218);
            ClientSize = new Size(402, 483);
            Controls.Add(loginBtn);
            Controls.Add(label7);
            Controls.Add(registrerenBtn);
            Controls.Add(passwordTxt);
            Controls.Add(usernameTxt);
            Controls.Add(emailTxt);
            Controls.Add(lastnameTxt);
            Controls.Add(firstnameTxt);
            Name = "Registeren";
            StartPosition = FormStartPosition.CenterScreen;
            Text = "Registeren";
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private TextBox firstnameTxt;
        private TextBox lastnameTxt;
        private TextBox emailTxt;
        private TextBox usernameTxt;
        private TextBox passwordTxt;
        private Button registrerenBtn;
        private Label label7;
        private Button loginBtn;
    }
}