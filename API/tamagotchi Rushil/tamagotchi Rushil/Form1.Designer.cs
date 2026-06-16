namespace tamagotchi_Rushil
{
    partial class Form1
    {
        /// <summary>
        ///  Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///  Clean up any resources being used.
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
        ///  Required method for Designer support - do not modify
        ///  the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            components = new System.ComponentModel.Container();
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form1));
            fotoAbu = new PictureBox();
            healthBar = new ProgressBar();
            etenBar = new ProgressBar();
            drinkenBar = new ProgressBar();
            etenBtn = new Button();
            Start = new Button();
            drinkenBtn = new Button();
            etenTimer = new System.Windows.Forms.Timer(components);
            drinkenTimer = new System.Windows.Forms.Timer(components);
            healthTimer = new System.Windows.Forms.Timer(components);
            healthLabel = new Label();
            etenLabel = new Label();
            drinkenLabel = new Label();
            scoreTimer = new System.Windows.Forms.Timer(components);
            scoreLabel = new Label();
            healthBarLabel = new Label();
            etenBarLabel = new Label();
            drinkenBarLabel = new Label();
            menuBtn = new Button();
            ((System.ComponentModel.ISupportInitialize)fotoAbu).BeginInit();
            SuspendLayout();
            // 
            // fotoAbu
            // 
            fotoAbu.BackColor = Color.Transparent;
            fotoAbu.Location = new Point(381, 156);
            fotoAbu.Name = "fotoAbu";
            fotoAbu.Size = new Size(331, 275);
            fotoAbu.SizeMode = PictureBoxSizeMode.AutoSize;
            fotoAbu.TabIndex = 0;
            fotoAbu.TabStop = false;
            // 
            // healthBar
            // 
            healthBar.ForeColor = Color.Red;
            healthBar.Location = new Point(33, 27);
            healthBar.Name = "healthBar";
            healthBar.Size = new Size(178, 58);
            healthBar.Style = ProgressBarStyle.Continuous;
            healthBar.TabIndex = 1;
            healthBar.Value = 100;
            // 
            // etenBar
            // 
            etenBar.ForeColor = Color.Lime;
            etenBar.Location = new Point(387, 27);
            etenBar.Name = "etenBar";
            etenBar.Size = new Size(178, 58);
            etenBar.Step = 1;
            etenBar.Style = ProgressBarStyle.Continuous;
            etenBar.TabIndex = 2;
            etenBar.Value = 100;
            // 
            // drinkenBar
            // 
            drinkenBar.ForeColor = Color.Blue;
            drinkenBar.Location = new Point(744, 30);
            drinkenBar.Name = "drinkenBar";
            drinkenBar.Size = new Size(178, 58);
            drinkenBar.Style = ProgressBarStyle.Continuous;
            drinkenBar.TabIndex = 3;
            drinkenBar.Value = 100;
            // 
            // etenBtn
            // 
            etenBtn.BackColor = Color.Lime;
            etenBtn.FlatStyle = FlatStyle.Flat;
            etenBtn.Font = new Font("Showcard Gothic", 13.8F, FontStyle.Regular, GraphicsUnit.Point, 0);
            etenBtn.ForeColor = Color.Black;
            etenBtn.Location = new Point(98, 592);
            etenBtn.Name = "etenBtn";
            etenBtn.Size = new Size(178, 56);
            etenBtn.TabIndex = 4;
            etenBtn.Text = "Geef eten";
            etenBtn.UseVisualStyleBackColor = false;
            etenBtn.Click += etenBtn_Click;
            // 
            // Start
            // 
            Start.BackColor = Color.Cyan;
            Start.FlatStyle = FlatStyle.Flat;
            Start.Font = new Font("Showcard Gothic", 13.8F);
            Start.ForeColor = Color.Black;
            Start.Location = new Point(458, 592);
            Start.Name = "Start";
            Start.Size = new Size(178, 56);
            Start.TabIndex = 5;
            Start.Text = "Start game";
            Start.UseVisualStyleBackColor = false;
            Start.Click += Start_Click;
            // 
            // drinkenBtn
            // 
            drinkenBtn.BackColor = Color.Red;
            drinkenBtn.FlatStyle = FlatStyle.Flat;
            drinkenBtn.Font = new Font("Showcard Gothic", 13.8F);
            drinkenBtn.Location = new Point(807, 592);
            drinkenBtn.Name = "drinkenBtn";
            drinkenBtn.Size = new Size(192, 56);
            drinkenBtn.TabIndex = 6;
            drinkenBtn.Text = "Geef drinken";
            drinkenBtn.UseVisualStyleBackColor = false;
            drinkenBtn.Click += drinkenBtn_Click;
            // 
            // etenTimer
            // 
            etenTimer.Interval = 200;
            etenTimer.Tick += etenTimer_Tick;
            // 
            // drinkenTimer
            // 
            drinkenTimer.Interval = 200;
            drinkenTimer.Tick += drinkenTimer_Tick;
            // 
            // healthTimer
            // 
            healthTimer.Interval = 400;
            healthTimer.Tick += healthTimer_Tick;
            // 
            // healthLabel
            // 
            healthLabel.AutoSize = true;
            healthLabel.BackColor = Color.Transparent;
            healthLabel.Font = new Font("Stencil", 16.2F, FontStyle.Regular, GraphicsUnit.Point, 0);
            healthLabel.Location = new Point(229, 43);
            healthLabel.Name = "healthLabel";
            healthLabel.Size = new Size(83, 33);
            healthLabel.TabIndex = 7;
            healthLabel.Text = "100%";
            // 
            // etenLabel
            // 
            etenLabel.AutoSize = true;
            etenLabel.BackColor = Color.Transparent;
            etenLabel.Font = new Font("Stencil", 16.2F);
            etenLabel.Location = new Point(585, 43);
            etenLabel.Name = "etenLabel";
            etenLabel.Size = new Size(83, 33);
            etenLabel.TabIndex = 8;
            etenLabel.Text = "100%";
            // 
            // drinkenLabel
            // 
            drinkenLabel.AutoSize = true;
            drinkenLabel.BackColor = Color.Transparent;
            drinkenLabel.Font = new Font("Stencil", 16.2F);
            drinkenLabel.Location = new Point(938, 43);
            drinkenLabel.Name = "drinkenLabel";
            drinkenLabel.Size = new Size(83, 33);
            drinkenLabel.TabIndex = 9;
            drinkenLabel.Text = "100%";
            // 
            // scoreTimer
            // 
            scoreTimer.Interval = 500;
            scoreTimer.Tick += scoreTimer_Tick;
            // 
            // scoreLabel
            // 
            scoreLabel.AutoSize = true;
            scoreLabel.BackColor = Color.Transparent;
            scoreLabel.Font = new Font("Stencil", 16.2F);
            scoreLabel.Location = new Point(70, 261);
            scoreLabel.Name = "scoreLabel";
            scoreLabel.Size = new Size(133, 33);
            scoreLabel.TabIndex = 10;
            scoreLabel.Text = "Score: 0";
            // 
            // healthBarLabel
            // 
            healthBarLabel.AutoSize = true;
            healthBarLabel.BackColor = Color.Transparent;
            healthBarLabel.Font = new Font("Stencil", 16.2F);
            healthBarLabel.Location = new Point(70, 88);
            healthBarLabel.Name = "healthBarLabel";
            healthBarLabel.Size = new Size(122, 33);
            healthBarLabel.TabIndex = 11;
            healthBarLabel.Text = "Health";
            // 
            // etenBarLabel
            // 
            etenBarLabel.AutoSize = true;
            etenBarLabel.BackColor = Color.Transparent;
            etenBarLabel.Font = new Font("Stencil", 16.2F);
            etenBarLabel.Location = new Point(433, 88);
            etenBarLabel.Name = "etenBarLabel";
            etenBarLabel.Size = new Size(83, 33);
            etenBarLabel.TabIndex = 12;
            etenBarLabel.Text = "Eten";
            // 
            // drinkenBarLabel
            // 
            drinkenBarLabel.AutoSize = true;
            drinkenBarLabel.BackColor = Color.Transparent;
            drinkenBarLabel.Font = new Font("Stencil", 16.2F);
            drinkenBarLabel.Location = new Point(769, 91);
            drinkenBarLabel.Name = "drinkenBarLabel";
            drinkenBarLabel.Size = new Size(139, 33);
            drinkenBarLabel.TabIndex = 13;
            drinkenBarLabel.Text = "Drinken";
            // 
            // menuBtn
            // 
            menuBtn.BackColor = Color.FromArgb(255, 128, 0);
            menuBtn.FlatStyle = FlatStyle.Flat;
            menuBtn.Font = new Font("Showcard Gothic", 13.8F);
            menuBtn.Location = new Point(914, 135);
            menuBtn.Name = "menuBtn";
            menuBtn.Size = new Size(133, 40);
            menuBtn.TabIndex = 14;
            menuBtn.Text = "Menu";
            menuBtn.UseVisualStyleBackColor = false;
            menuBtn.Click += menuBtn_Click;
            // 
            // Form1
            // 
            AutoScaleDimensions = new SizeF(8F, 20F);
            AutoScaleMode = AutoScaleMode.Font;
            BackgroundImage = (Image)resources.GetObject("$this.BackgroundImage");
            ClientSize = new Size(1074, 685);
            Controls.Add(menuBtn);
            Controls.Add(drinkenBarLabel);
            Controls.Add(etenBarLabel);
            Controls.Add(healthBarLabel);
            Controls.Add(scoreLabel);
            Controls.Add(drinkenLabel);
            Controls.Add(etenLabel);
            Controls.Add(healthLabel);
            Controls.Add(drinkenBtn);
            Controls.Add(Start);
            Controls.Add(etenBtn);
            Controls.Add(drinkenBar);
            Controls.Add(etenBar);
            Controls.Add(healthBar);
            Controls.Add(fotoAbu);
            Icon = (Icon)resources.GetObject("$this.Icon");
            MinimumSize = new Size(959, 631);
            Name = "Form1";
            StartPosition = FormStartPosition.Manual;
            Text = "Tamagotich Abu";
            ((System.ComponentModel.ISupportInitialize)fotoAbu).EndInit();
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private PictureBox fotoAbu;
        private ProgressBar healthBar;
        private ProgressBar etenBar;
        private ProgressBar drinkenBar;
        private Button etenBtn;
        private Button Start;
        private Button drinkenBtn;
        private System.Windows.Forms.Timer etenTimer;
        private System.Windows.Forms.Timer drinkenTimer;
        private System.Windows.Forms.Timer healthTimer;
        private Label healthLabel;
        private Label etenLabel;
        private Label drinkenLabel;
        private System.Windows.Forms.Timer scoreTimer;
        private Label scoreLabel;
        private Label healthBarLabel;
        private Label etenBarLabel;
        private Label drinkenBarLabel;
        private Button menuBtn;
    }
}
