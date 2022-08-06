package com.example.admindigitalmengawasibcgresik;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.util.HashMap;

public class HomeActivity extends AppCompatActivity {
    private TextView nama;
    private Button btn_laporan, btn_logout;
    SessionManager sessionManager;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        sessionManager = new SessionManager(this);
        sessionManager.checkLogin();


        nama = findViewById(R.id.name);
        btn_logout = findViewById(R.id.btn_logout);
        btn_laporan = findViewById(R.id.btn_laporan);

        HashMap<String, String> user = sessionManager.getuserDetail();
        String mName = user.get(sessionManager.NAMA);
        final String mIdPegawai = user.get(sessionManager.IDPEGAWAI);
        nama.setText(mName);


        btn_logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sessionManager.logout();
            }
        });

        btn_laporan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HomeActivity.this, CariActivity.class);
                //intent.putExtra("idpegawai", mIdPegawai);
                startActivity(intent);

            }
        });
    }
}
