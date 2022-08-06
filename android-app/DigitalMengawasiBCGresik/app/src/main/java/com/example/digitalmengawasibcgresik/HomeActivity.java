package com.example.digitalmengawasibcgresik;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.util.HashMap;

public class HomeActivity extends AppCompatActivity {
    private TextView nama;
    private Button btn_lapor, btn_history, btn_gantipassword, btn_logout;
    SessionManager sessionManager;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        sessionManager = new SessionManager(this);
        sessionManager.checkLogin();


        nama = findViewById(R.id.name);
        btn_logout = findViewById(R.id.btn_logout);
        btn_lapor = findViewById(R.id.btn_lapor);
        btn_gantipassword = findViewById(R.id.btn_gantipassword);
        btn_history = findViewById(R.id.btn_history);

        HashMap<String, String> user = sessionManager.getuserDetail();
        String mName = user.get(sessionManager.NAMA);
        final String mIdAgen = user.get(sessionManager.IDAGEN);
        nama.setText(mName);


        btn_logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sessionManager.logout();
            }
        });

        btn_lapor.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HomeActivity.this, LaporActivity.class);
                intent.putExtra("idagen", mIdAgen);
                startActivity(intent);

            }
        });
        btn_gantipassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HomeActivity.this, GantiPassword.class);
                intent.putExtra("idagen", mIdAgen);
                startActivity(intent);
            }
        });
        btn_history.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HomeActivity.this, HistoryActivity.class);
                intent.putExtra("idagen", mIdAgen);
                startActivity(intent);
            }
        });
    }
}
