namespace tamagotchi_Rushil
{
    partial class Menu
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
            gameBtn = new Button();
            scoreBtn = new Button();
            label1 = new Label();
            SuspendLayout();
            // 
            // gameBtn
            // 
            gameBtn.BackColor = Color.FromArgb(243, 166, 30);
            gameBtn.FlatAppearance.BorderSize = 0;
            gameBtn.FlatStyle = FlatStyle.Flat;
            gameBtn.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            gameBtn.ForeColor = Color.FromArgb(29, 19, 92);
            gameBtn.Location = new Point(30, 108);
            gameBtn.Name = "gameBtn";
            gameBtn.Size = new Size(270, 46);
            gameBtn.TabIndex = 0;
            gameBtn.Text = "Ga naar spel";
            gameBtn.UseVisualStyleBackColor = false;
            gameBtn.Click += gameBtn_Click;
            // 
            // scoreBtn
            // 
            scoreBtn.BackColor = Color.FromArgb(243, 166, 30);
            scoreBtn.FlatAppearance.BorderSize = 0;
            scoreBtn.FlatStyle = FlatStyle.Flat;
            scoreBtn.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            scoreBtn.ForeColor = Color.FromArgb(29, 19, 92);
            scoreBtn.Location = new Point(30, 191);
            scoreBtn.Name = "scoreBtn";
            scoreBtn.Size = new Size(270, 46);
            scoreBtn.TabIndex = 1;
            scoreBtn.Text = "Highscores";
            scoreBtn.UseVisualStyleBackColor = false;
            scoreBtn.Click += scoreBtn_Click;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("Papyrus", 13.8F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label1.ForeColor = Color.FromArgb(254, 221, 122);
            label1.Location = new Point(131, 27);
            label1.Name = "label1";
            label1.Size = new Size(81, 37);
            label1.TabIndex = 2;
            label1.Text = "Menu";
            // 
            // Menu
            // 
            AutoScaleDimensions = new SizeF(8F, 20F);
            AutoScaleMode = AutoScaleMode.Font;
            BackColor = Color.FromArgb(29, 128, 195);
            ClientSize = new Size(342, 289);
            Controls.Add(label1);
            Controls.Add(scoreBtn);
            Controls.Add(gameBtn);
            Name = "Menu";
            StartPosition = FormStartPosition.CenterScreen;
            Text = "Menu";
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Button gameBtn;
        private Button scoreBtn;
        private Label label1;
    }
}