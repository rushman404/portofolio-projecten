namespace tamagotchi_Rushil
{
    partial class highScores
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
            highScoresList = new ListBox();
            label1 = new Label();
            MenuBtn = new Button();
            SuspendLayout();
            // 
            // highScoresList
            // 
            highScoresList.BackColor = Color.FromArgb(29, 19, 92);
            highScoresList.BorderStyle = BorderStyle.None;
            highScoresList.Font = new Font("Press Start 2P", 9F, FontStyle.Regular, GraphicsUnit.Point, 0);
            highScoresList.ForeColor = Color.FromArgb(253, 242, 177);
            highScoresList.FormattingEnabled = true;
            highScoresList.IntegralHeight = false;
            highScoresList.ItemHeight = 21;
            highScoresList.Location = new Point(21, 82);
            highScoresList.Name = "highScoresList";
            highScoresList.SelectionMode = SelectionMode.None;
            highScoresList.Size = new Size(768, 314);
            highScoresList.TabIndex = 0;
            highScoresList.TabStop = false;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("Papyrus", 19.8000011F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label1.ForeColor = Color.FromArgb(229, 186, 51);
            label1.Location = new Point(259, 9);
            label1.Name = "label1";
            label1.Size = new Size(271, 54);
            label1.TabIndex = 1;
            label1.Text = "Top 10 Players";
            // 
            // MenuBtn
            // 
            MenuBtn.BackColor = Color.FromArgb(137, 27, 105);
            MenuBtn.FlatAppearance.BorderSize = 0;
            MenuBtn.FlatStyle = FlatStyle.Flat;
            MenuBtn.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            MenuBtn.ForeColor = Color.White;
            MenuBtn.Location = new Point(259, 440);
            MenuBtn.Name = "MenuBtn";
            MenuBtn.Size = new Size(270, 46);
            MenuBtn.TabIndex = 3;
            MenuBtn.Text = "Terug naar menu";
            MenuBtn.UseVisualStyleBackColor = false;
            MenuBtn.Click += MenuBtn_Click;
            // 
            // highScores
            // 
            AutoScaleDimensions = new SizeF(8F, 20F);
            AutoScaleMode = AutoScaleMode.Font;
            BackColor = Color.FromArgb(29, 19, 92);
            ClientSize = new Size(818, 528);
            Controls.Add(MenuBtn);
            Controls.Add(label1);
            Controls.Add(highScoresList);
            Font = new Font("Segoe UI", 9F);
            Name = "highScores";
            Text = "highScores";
            Load += highScores_Load;
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private ListBox highScoresList;
        private Label label1;
        private Button MenuBtn;
    }
}